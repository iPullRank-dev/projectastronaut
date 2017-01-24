<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;

use DB;

use PDF;

Use Excel;

use Schema;

class ReportSetup extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
        public function __construct()
	{
    $this->middleware('auth');
	}  
     
    public function index()
    {
    
    	$test = DB::table('prospects')
    		->get();
    		
    	if(count($test)>0){	
        $record = DB::table('prospects')
            ->Join('prospectscores', 'prospects.id', '=', 'prospectscores.company_id')
            ->select('prospects.id','prospects.fc_company_name','prospects.fc_website','prospectscores.final_grade')
            ->get();
        $n = count($record);
        for ($i=0;$i<$n;$i++) {
                $usercount = DB::table('prospectusers')
                ->where('company_id','=',$record[$i]->id)
                ->get();
                $totaluser = count($usercount);
                $record[$i]->user_total = $totaluser;
            }    
        
		return view("reportset",["data" => $record]);
		}else{
		return view("reportsetnodata");
		};
    }


    public function uploadreport(Request $request)
    {
            //companyfile
        $clean = $request->input('clean');

        if($clean){
        DB::table('prospects')->truncate();
        DB::table('prospectscores')->truncate();
        DB::table('prospectusers')->truncate();
        DB::table('shorturls')->truncate();
        DB::table('rank')->truncate();
        };


        $companyfile = Input::file('prospectsToUpload');
           // SET UPLOAD PATH
        $destinationPath = 'uploads';
            // GET THE FILE EXTENSION
            // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = 'company.' . 'csv';
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        if($companyfile == null){
            $upload_success = true;
            $company_watcher = 0;
        }else{
        $upload_success = $companyfile->move($destinationPath, $fileName);
        $company_watcher = 1;
        };
        //contactfile


        $contactfile = Input::file('contactsToUpload');
           // SET UPLOAD PATH
        $destinationPath = 'uploads';
            // GET THE FILE EXTENSION
            // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = 'contact.' . 'csv';
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        if($contactfile == null){
            $upload_success_2 = true;
            $contact_watcher = 0;
        }else{
        $upload_success_2 = $contactfile->move($destinationPath, $fileName);
        $contact_watcher = 1;
        };
        

        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE
        if ($upload_success && $upload_success_2) {

            $companydata = Excel::load('public/uploads/company.csv', function($reader) {
            })->toArray();

            $contactdata = Excel::load('public/uploads/contact.csv', function($reader) {
            })->toArray(); 

            //prospects+prospectsocres
            if ($company_watcher != 0){
            $n = count($companydata);

            for($i=0;$i<$n;$i++){
                //$storescore['final_score'] = $companydata[$i]['final_score'];
                //$storescore['quad1'] = $companydata[$i]['quad1'];
                //$storescore['quad2'] = $companydata[$i]['quad2'];
                //$storescore['quad3'] = $companydata[$i]['quad3'];
                //$storescore['quad4'] = $companydata[$i]['quad4'];
                //unset($companydata[$i]['final_score']);

                $keyrecorder = array_search("final_grade", array_keys($companydata[$i]));
                $storescore = array_splice($companydata[$i], $keyrecorder);

                // foreach ($companydata[$i] as $key => $value) {
                //     $indata[$key] = $value;
                // };

                $keyrecorder = array_search("industry_ranking", array_keys($storescore));
                $ranklist = array_splice($storescore, $keyrecorder);

                $indata['created_at'] = date("Y-m-d H:i:s");
                $companydata[$i]['account_with'] = 'louis@ipullrank.com';
                $companyid = DB::table('prospects')->insertGetId($companydata[$i]);
                $storescore['company_id'] = $companyid;
                $storescore['created_at'] = date("Y-m-d H:i:s");
                $ranklist['company'] = $companydata[$i]['fc_company_name'];
                $ranklist['vector_ranking'] = $storescore['rank'];
                DB::table('prospectscores')->insert($storescore);
                DB::table('rank')->insert($ranklist);

            };};
            //prospectusers&shorturls


            if ($contact_watcher != 0){
            $n = count($contactdata);

            for($i=0;$i<$n;$i++){
                foreach ($contactdata[$i] as $key => $value) {
                    $indata2[$key] = $value;
                };

                $companyid = DB::table('prospects')->where('fc_company_name','=', $contactdata[$i]['company'])->first();
                $companyid = $companyid -> id;
                $indata2['company_id'] = $companyid;
                $indata2['created_at'] = date("Y-m-d H:i:s");
                $indata2['active'] = 1;

                $userid = DB::table('prospectusers')->insertGetId($indata2);
                $urldata['company_id'] = $companyid;
                $urldata['user_id'] = $userid;
                $urldata['created_at'] = date("Y-m-d H:i:s");
                $inurl = $companyid . '_' . $contactdata[$i]['email'] . '=' . $userid;
                $hased = base64_encode($inurl);
                $urldata['url_hash'] = $hased;
                DB::table('shorturls') ->insert($urldata);

                //add this contact to REPLY
                $reply = array();
                $reply['campaignId'] = 24295;
                $reply['email'] = $indata2['email'];
                // $reply['firstName'] = $indata2['full_name'];


                if (strpos($indata2['full_name'], ' ') !== false) {
                    $name_array = explode(' ', $indata2['full_name'],2);
                    $reply['lastName'] = $name_array[1];
                    $reply['firstName'] = $name_array[0];
                }else{
                    $reply['firstName'] = $indata2['full_name'];
                }
                $reply['company'] = $indata2['company'];
                $reply['customFields'] = array(array(
                    "key" => "PAURL",
                    "value" => "http://vector.ipullrank.com/display-report?report=".$hased."&company=".str_replace(' ', '_', $indata2['company'])
                    ));

                $api_data = json_encode($reply);

                $service_url = 'https://run.replyapp.io/api/v1/actions/addandpushtocampaign';

                // make curl command its own function just in case you need to do something like this again in another place
                $ch = curl_init($service_url); 
                curl_setopt($ch, 
                            CURLOPT_HTTPHEADER, 
                            array('Content-Type: application/json', 
                            'X-Api-Key: '));
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $api_data);
                curl_setopt($ch, CURLOPT_POST, 1);
                $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                $server_output = curl_exec ($ch);
                curl_close ($ch);

            };};

            return redirect('/admin/report-setup/');
         }   
    }  

     public function printreport($id)
    {
        $realid = $id;
        $reportdata = DB::select('select * from prospectscores where company_id='.$realid);
        $companyinfo = DB::select('select * from prospects where id='.$realid);
        $copy = DB::select('select * from copytext');
            foreach ($copy as $value) {
                $currentquad = $value -> quad;
                $finder = $reportdata[0]->$currentquad;
                $finder = strtolower($finder);
                if($finder != 'null' && $finder != null){
                $copydata[$currentquad] = $value -> $finder;
                }else{
                $copydata[$currentquad] = 'No Data'; 
                };
            }
        return PDF::loadView("pdf",["data"=>$reportdata,"companyinfo"=>$companyinfo,"copycontent" => $copydata])->stream();
    } 

    public function updatecompany(Request $request)
    {
        $input = $request->all();
        foreach ($input as $key => $value) {
            if(Schema::hasColumn('prospects', $key)){
                $cinfo[$key] = $value;
            }elseif (Schema::hasColumn('prospectscores', $key)) {
                $cgrade[$key] = $value;
            };
        };

        $cinfo['updated_at'] = date("Y-m-d H:i:s");
        $cgrade['updated_at'] = date("Y-m-d H:i:s");
        DB::table('prospects')
            ->where('id', $input['id'])
            ->update($cinfo);

        $rankinfo['company'] = $cinfo['fc_company_name'];
        $rankinfo['vector_ranking'] = $cgrade['rank'];

        DB::table('rank')
            ->where('id',$input['id'])
            ->update($rankinfo);

        DB::table('prospectscores')
            ->where('company_id', $input['id'])
            ->update($cgrade);    
        
        return redirect('/admin/report-setup/');
    }

    public function export(){
        $companycontacts = DB::select('select * from shorturls');


        $companycontacts = DB::table('shorturls')
                            ->join('prospects', 'shorturls.company_id', '=', 'prospects.id')
                            ->select('shorturls.*', 'prospects.fc_company_name')
                            ->get();

        foreach ($companycontacts as $value) {
            $value->real_url = "http://vector.ipullrank.com/display-report?report=".$value->url_hash."&company=".str_replace(' ', '_', $value->fc_company_name);
            $data[] = (array)$value;  
        };
        Excel::create('Filename', function($excel)use($data) {
            $excel->sheet('sheet1',function($sheet)use($data){
                $sheet->fromArray($data);
            });
        })->download('xls');
    }   

    
}

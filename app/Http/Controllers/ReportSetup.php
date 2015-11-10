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
            ->select('prospects.id','prospects.fc_company_name','prospects.fc_website','prospectscores.final_score')
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

                $keyrecorder = array_search("final_score", array_keys($companydata[$i]));
                $storescore = array_splice($companydata[$i], $keyrecorder);

                foreach ($companydata[$i] as $key => $value) {
                    $indata[$key] = $value;
                };
                $indata['created_at'] = date("Y-m-d H:i:s");
                $companyid = DB::table('prospects')->insertGetId($indata);
                $storescore['company_id'] = $companyid;
                $storescore['created_at'] = date("Y-m-d H:i:s");
                DB::table('prospectscores')->insert($storescore);

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
                $userid = DB::table('prospectusers')->insertGetId($indata2);
                $urldata['company_id'] = $companyid;
                $urldata['user_id'] = $userid;
                $urldata['created_at'] = date("Y-m-d H:i:s");
                $inurl = $companyid . '_' . $contactdata[$i]['email'] . '=' . $userid;
                $hased = base64_encode($inurl);
                $urldata['url_hash'] = $hased;
                DB::table('shorturls') ->insert($urldata);

            };};

            return redirect('/admin/report-setup/');
         }   
    }  

     public function printreport($id)
    {
        $realid = $id;
        $reportdata = DB::select('select * from prospectscores where company_id='.$realid);
        $companyinfo = DB::select('select * from prospects where id='.$realid);
        return PDF::loadView("pdf",["data"=>$reportdata,"companyinfo"=>$companyinfo])->stream();
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

        DB::table('prospectscores')
            ->where('company_id', $input['id'])
            ->update($cgrade);    
        
        return redirect('/admin/report-setup/');
    }   

    
}

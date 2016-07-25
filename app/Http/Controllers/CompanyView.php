<?php

namespace App\Http\Controllers;
use DB;

Use Excel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompanyView extends Controller
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
    
     
    public function index(Request $request)
    {
        $id = $request -> query('id');
        $kickoffdate = new \Datetime(date("Y-m-d"));
        $dt = new \Datetime(date("Y-m-d",strtotime('-30 days')));
        $others = array("dimensions" => "ga:date","filters" => "ga:eventCategory==authcompany;ga:eventLabel==" . $id);
        
        // lazy inefficient way to get this in the format that I want
        $gaResponse = json_decode(json_encode(\Spatie\LaravelAnalytics\LaravelAnalyticsFacade::setSiteId('ga:111234771')->performQuery($dt,$kickoffdate,"ga:sessions",$others)),true);
        //print_r($gaResponse);

        $others2 = array("dimensions" => "ga:date","filters" => "ga:eventCategory==inviteSent;ga:eventLabel==" . $id);
        $gaResponse2 = json_decode(json_encode(\Spatie\LaravelAnalytics\LaravelAnalyticsFacade::setSiteId('ga:111234771')->performQuery($dt,$kickoffdate,"ga:goal1Completions",$others2)),true);

        $others3 = array("dimensions" => "ga:date","filters" => "ga:eventCategory==contactRequestB;ga:eventLabel==" . $id);
        $gaResponse3 = json_decode(json_encode(\Spatie\LaravelAnalytics\LaravelAnalyticsFacade::setSiteId('ga:111234771')->performQuery($dt,$kickoffdate,"ga:goal3Completions",$others3)),true);

        $finalGA['schema'] = array('date','sessions');
        $finalGA['rows'] = $gaResponse['rows'];
        $finalGA['totals'] = $gaResponse['totalsForAllResults'];

        $finalGA['conversionRows'] = $gaResponse2['rows'];
        $finalGA['conversionRows2'] = $gaResponse3['rows'];

        $companyDetail = DB::select('select * from prospects where id='.$id);
        $companycontacts = DB::select('select * from prospectusers where company_id='.$id);
        $companyscore = DB::select('select * from prospectscores where company_id='.$id);
        $adminusers = DB::select('select * from adminusers');

        $owener = DB::table('adminusers')
                ->where('email','=',$companyDetail[0] -> account_with)->first();

        $companyDetail[0] -> manager = $owener -> username;

        $usernumber = [];
        $day = new \Datetime(date("Y-m-d",strtotime('-30 days')));
        for($i = 0; $i<=30;$i++){
            $usernumber[$i] = 0;
            foreach ($companycontacts as $value) {
                $uday = new \Datetime($value -> created_at);
                if($day->format("y-m-d") == $uday->format("y-m-d")){
                    $usernumber[$i]+= 1; 
                }
            }
            $day->add(new \DateInterval('P1D'));
        }

        $finalGA['new'] = $usernumber;

        //$companycontacts = DB::table('prospectusers')
        //    ->Join('shorturls', function($join) use ($id) {
        //        $join->on('prospectusers.id','=','shorturls.user_id')
        //             ->where('prospectusers.company_id','=',$id);   
        //    })
        //    ->select('prospectusers.*','shorturls.visited','shorturls.url_hash')
        //    ->get();


		return view("companyview",['data'=>$companyDetail,'contacts'=>$companycontacts,'grade'=>$companyscore,"analytics"=>$finalGA,'admin'=>$adminusers]);
    }

    public function export($id){
        $companycontacts = DB::select('select * from prospectusers where company_id='.$id);
        foreach ($companycontacts as $value) {
            $data[] = (array)$value;  
        };
        Excel::create('Filename', function($excel)use($data) {
            $excel->sheet('sheet1',function($sheet)use($data){
                $sheet->fromArray($data);
            });
        })->download('xls');
    }

    public function detail()
    {
        //
		return view("companyview");
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class userdata extends Controller
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
     
    public function index($id)
    {
        //
        $kickoffdate = new \Datetime(date("Y-m-d"));
        $dt = new \Datetime(date("Y-m-d",strtotime('-30 days')));
        $others = array("dimensions" => "ga:date","filters" => "ga:eventCategory==authuser;ga:eventLabel==" . $id);
        
        // lazy inefficient way to get this in the format that I want
        $gaResponse = json_decode(json_encode(\Spatie\LaravelAnalytics\LaravelAnalyticsFacade::setSiteId('ga:111234771')->performQuery($dt,$kickoffdate,"ga:goal1Completions,ga:sessions",$others)),true);
        //print_r($gaResponse);

        $finalGA['schema'] = array('date','conversion','sessions');
        $finalGA['rows'] = $gaResponse['rows'];
        $finalGA['totals'] = $gaResponse['totalsForAllResults'];

        $userdata = DB::select('select * from prospectusers where id='.$id);
        $users = array("response"=>"200","message"=>"No data yet");
        return view ("contact",["data"=>$userdata,"analytics"=>$finalGA]);
    }

    public function useranalytics()
    {
        //
        //$users = DB::select("select * from prospectusers");
        //return view ("user-detail",["data"=>$users]);
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

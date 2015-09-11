<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Mail;

class tests extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        //return \Spatie\LaravelAnalytics\LaravelAnalyticsFacade::setSiteId('ga:107200333')->getVisitorsAndPageViews();
        
        // iPullRank analytics
       // return \Spatie\LaravelAnalytics\LaravelAnalyticsFacade::setSiteId('ga:49193589')->getVisitorsAndPageViews(); // will use the given siteId

        $kickoffdate = new \DateTime('2015-8-21');
        $dt = new \DateTime('2015-8-1');
        $others = array("dimensions" => "ga:date");
        
        // lazy inefficient way to get this in the format that I want
        $gaResponse = json_decode(json_encode(\Spatie\LaravelAnalytics\LaravelAnalyticsFacade::setSiteId('ga:49193589')->performQuery($dt,$kickoffdate,"ga:goal1Completions,ga:sessions",$others)),true);
        //print_r($gaResponse);

        $finalGA['schema'] = array('date','conversion','sessions');
        $finalGA['rows'] = $gaResponse['rows'];
        $finalGA['totals'] = $gaResponse['totalsForAllResults'];
        
        echo json_encode($finalGA);
        
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

    public function sendmail()
    {
        
            
            $user = DB::table('prospectusers')->where('id','=', 123)->first();
            $url = DB::table('shorturls')->where('id','=', 123)->first();

            Mail::send('emails.newuser', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->full_name)->subject('Your Unique access to PA');
            });


            return view("emails.newuser");
            
        
    }
}

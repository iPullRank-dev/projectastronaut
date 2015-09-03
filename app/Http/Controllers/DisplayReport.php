<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DisplayReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

	// show the report
    public function index($id)
    {
		//return "Yo does this work?";

		// need all pageviews over time
		//$analyticsData = LaravelAnalytics::getVisitorsAndPageViews(7);

		// need conversions over time
		// $conversions = LaravelAnalytics::performQuery($startDate, $endDate, $metrics, $others = array());

		//$data = array('analytics' => $analyticsData,'conversions' => $conversions);
		//return view("report",$data);
		$reportdata = DB::select('select * from prospectscores where company_id='.$id);
        $companyinfo = DB::select('select * from prospects where id='.$id);
		return view("report",["data"=>$reportdata,"companyinfo"=>$companyinfo]);
    }
	
	// Show the page with the modal for the unidentified user
    public function unidentified()
    {
        //
		return view("report");
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

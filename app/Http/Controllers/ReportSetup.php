<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        
        
		return view("reportset",["data" => $record]);
		}else{
		return view("reportsetnodata");
		};
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

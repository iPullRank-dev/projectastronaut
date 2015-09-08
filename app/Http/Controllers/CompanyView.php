<?php

namespace App\Http\Controllers;
use DB;
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
    
     
    public function index($id)
    {
        
        $companyDetail = DB::select('select * from prospects where id='.$id);
        $companycontacts = DB::select('select * from prospectusers where company_id='.$id);

        //$companycontacts = DB::table('prospectusers')
        //    ->Join('shorturls', function($join) use ($id) {
        //        $join->on('prospectusers.id','=','shorturls.user_id')
        //             ->where('prospectusers.company_id','=',$id);   
        //    })
        //    ->select('prospectusers.*','shorturls.visited','shorturls.url_hash')
        //    ->get();


		return view("companyview",['data'=>$companyDetail,'contacts'=>$companycontacts]);
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

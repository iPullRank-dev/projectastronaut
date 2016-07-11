<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class internalDisplayReport extends Controller
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


    // show the report
    public function index(Request $request)
    {
        $id = $request -> query('report');

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
            return view("reportin",["data"=>$reportdata,"companyinfo"=>$companyinfo,"copycontent" => $copydata]);

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


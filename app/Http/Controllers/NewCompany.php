<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;

use DB;

Use Excel;

class NewCompany extends Controller
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
        //
		return view("new");
    }

    public function upload()
    {
        //
 
        // GET ALL THE INPUT DATA , $_GET,$_POST,$_FILES.
        
        $file = Input::file('fileToUpload');
           // SET UPLOAD PATH
        $destinationPath = 'uploads';
            // GET THE FILE EXTENSION
        $extension = $file->getClientOriginalExtension();
            // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = 'test.' . $extension;
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $file->move($destinationPath, $fileName);
        
        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE
        if ($upload_success) {

        

            $data = Excel::load('public/uploads/test.csv', function($reader) {
            })->toArray();

        foreach ($data[0] as $key => $value) {
                $final[$key] = $value;
            }    

        $id = DB::table('prospects')->insertGetId($final);

        return view("test",["results"=>$data[0]['fc_company_name']]);    
            
        }
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

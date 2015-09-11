<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Ajax extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
		return json_encode(array("response" => "200", "message" => "Ajax is under construction"));
    }

	/**
     * Upload file
     *
     * @return Response
     */
    public function upload()
    {
        //

		return json_encode(array("response" => "200", "message" => "Ajax Upload is under construction"));
    }

	/**
     * Add New Company
     *
     * @return Response
     */
    public function newCompany()
    {
        //

		return json_encode(array("response" => "200", "message" => "Ajax New Company is under construction"));
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
    
    public function insertuser()
    {
    	if (isset($_POST['userdata']))
    	{
    		$newdata = $_POST['userdata'];
    		
    		$indata = ['email' => $newdata[3], 'full_name' => $newdata[1], 'title' => $newdata[2], 'company_id' => $newdata[4], 'fc_gravatar' => $newdata[0], 'company' => $newdata[5]];
    		
    		$id = DB::table('prospectusers')->insertGetId($indata);
    		
            $inurl = $newdata[4] . '_' . $newdata[3] . '=' . $id;

            $hased = base64_encode($inurl);

            $urldata = ['company_id' => $newdata[4], 'user_id' => $id, 'url_hash' => $hased];

            DB::table('shorturls') ->insert($urldata);
    		//DB::insert('insert into prospectusers (email, full_name, title, company_id, fc_gravatar, company) values (?, ?, ?, ?, ?, ?)', [$newuserdata[3], $newuserdata[1], $newuserdata[2], $newuserdata[4], $newuserdata[0], $newuserdata[5]]);
    		


		return $id;
		
		}else{
		return 'false call';
		};
    }
    
    public function deleteuser()
    {
    	if (isset($_POST['deleteuser']))
    	{
    		$delete = $_POST['deleteuser'];

            $find = DB::table('prospectusers')->where('email','=',$delete)->first();

            $id = $find -> id;
    		
    		DB::table('prospectusers')->where('email', '=', $delete)->delete();

            DB::table('shorturls')->where('user_id', '=', $id)->delete();

    		
    		//DB::insert('insert into prospectusers (email, full_name, title, company_id, fc_gravatar, company) values (?, ?, ?, ?, ?, ?)', [$newuserdata[3], $newuserdata[1], $newuserdata[2], $newuserdata[4], $newuserdata[0], $newuserdata[5]]);
    		
		return "success!";
		
		}else{
		return 'false call';
		};
    }
    
    public function updateuser()
    {
    	if (isset($_POST['update']))
    	{
    		$updater= $_POST['update'];
    		
    		$updateitem = ['email' => $updater[3], 'full_name' => $updater[1], 'title' => $updater[2], 'fc_gravatar' => $updater[0]];

    		DB::table('prospectusers')
            ->where('email', $updater[3])
            ->update($updateitem);
    		
    		$uid = DB::table('prospectusers')
            ->where('email', '=', $updater[3])
            ->get();
            
            $output = $uid[0] -> id;
    		
            $inurl = $updater[4] . '_' . $updater[3] . '=' .$output;

            $hased = base64_encode($inurl);

            DB::table('shorturls')
            ->where('user_id', '=', $output)
            ->update(['url_hash' => $hased]);

		    return $output;
		
		}else{
		return 'false call';
		};
    }
    
    public function loadcode()
    {
    	if (isset($_POST['codeid']))
    	{	
    		$companyid = $_POST['codeid'];
    		$code = DB::table('prospects')
            ->where('id', '=', $companyid)
            ->select('code_zone')
            ->get();
    		
    		$output = $code[0] -> code_zone;
    		
    		return $output;
    		
		}else{
		return 'false call';
		};
    }
    
    public function savecode()
    {
    	if (isset($_POST['scode']))
    	{	
			$savecode = $_POST['scode'];
    		
    		DB::table('prospects')
            ->where('id', '=', $savecode[0])
            ->update(['code_zone' => $savecode[1]]);
    		
    		return 'success';
    		
		}else{
		return 'false call!!';
		};
    }

    public function userurl()
    {
        if (isset($_POST['userid']))
        {   
            $user = $_POST['userid'];
            
            $hashurl = DB::table('shorturls')
            ->where('user_id', '=', $user)
            ->select('url_hash')
            ->get();

            $output = $hashurl[0]-> url_hash;
            
            
            //return $output;

            //$a = DB::table('prospects')
            //->where('id', '=', $uesr)
            //->select('code_zone')
            //->get();
            
            //$outa = $a[0] -> code_zone;
            
            return $output;
            
            
        }else{
        return 'false call!!';
        };
    }
    
    public function reportauth()
    {
        if (isset($_POST['fingerprint']))
        {   
            $packdata = $_POST['fingerprint'];
            $hashinfo = $packdata[1];
            $fprint = $packdata[0];
            $find = DB::table('shorturls')->where('url_hash','=',$hashinfo)->first();
            if(strlen($find->uuid) != 0){
                if($find->uuid == $fprint){
                    return 1;
                };
            }else{
                DB::table('shorturls')
                    ->where('url_hash','=',$hashinfo)
                    ->update(['uuid' => $fprint]);
                return 1;
            };    
            
            
            
            
        }else{
        return 'false call!!';
        };
    }

    public function reportauthemail()
    {
        if (isset($_POST['email']))
        {   
            $uesremail = $_POST['email'];
            $find = DB::table('prospectusers')->where('email','=',$uesremail)->first();
            if($find != null){
                return 1;
            }else{
                return 0;
            };
            
            
        }else{
        return 'false call!!';
        };
    }

    public function sendmail()
    {
        if (isset($_POST['userid']))
        {   
            $id = $_POST['userid'];
            $user = DB::table('prospectusers')->where('id','=',$id)->first();
            $url = DB::table('shorturls')->where('user_id','=',$id)->first();
            $url = $url -> url_hash;
            $user -> url = $url;

            Mail::send('emails.newuser', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->full_name)->subject('Your Unique access to PA');
            });


            return $user->url;
            
        }else{
        return 'false call!!';
        };
    }

    public function sendmail2()
    {
        if (isset($_POST['getdata']))
        {   
            $data = $_POST['getdata'];
            $user = DB::table('prospectusers')->where('id','=',$data[0])->first();
            $url = DB::table('shorturls')->where('user_id','=',$data[0])->first();
            $unhash = base64_decode($data[2]);
            $position = strpos($unhash,"_");
            $position2 = strpos($unhash,"=");
            $invite = substr($unhash, $position+1, $position2-$position-1);
            $url = $url -> url_hash;
            $user -> url = $url;
            $user -> msg = $data[1];
            $user -> inviter = $invite;

            Mail::send('emails.inviteuser', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->full_name)->subject('Your are invited to PA report');
            });


            return $user->url;
            
        }else{
        return 'false call!!';
        };
    }

}

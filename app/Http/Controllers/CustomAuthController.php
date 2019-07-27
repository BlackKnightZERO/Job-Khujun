<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\User;
use App\company;
use App\Job;
use Auth;
use Validator;

class CustomAuthController extends Controller
{

	public function showIndex()
	{
		$allJobPosts = DB::table('jobs')
		->join('companies','jobs.company_id','companies.id')
		->orderBy('jobs.created_at', 'desc')
		->select('jobs.id as jid','location as jlocation','job_title as jtitle','job_description as jdesc','companies.company_name as jcomp','jobs.job_applicant_id as jaid')
		->get();

		 return view('job.index',['allJobPosts'=>$allJobPosts]);
	}
    public function showRegisterForm()
    {
    	return view('user.register');
    }
    public function register(Request $request)
    {
    	if($request->input('admin_company_id')=='')
    	{
    		$this->userValidation($request);
	    	$user = new User;
	    	$user->first_name = $request->input('first_name');
	    	$user->last_name = $request->input('last_name');
	    	$user->email = $request->input('email');
	    	$user->password = bcrypt($request->input('password'));
	    	$user->admin_company_id = 1;
	    	$user->save();
	    	return redirect('/')->with('Status','You are registered');
    	}  	

    	else if($request->input('admin_company_id')=='1')
    	{
			$this->CompanyAdminValidation($request);
			$company = new company;
	    	$company->company_name = $request->input('company_name');
	    	$company->save();

	    	$id = $company->id;

	    	$user = new User;
	    	$user->first_name = $request->input('first_name');
	    	$user->last_name = $request->input('last_name');
	    	$user->email = $request->input('email');
	    	$user->password = bcrypt($request->input('password'));
	    	$user->admin_company_id = $id;
	    	$user->save();
			return redirect('/')->with('Status','Your Company was registered');

    	}	
    	else
    	{	
    		echo "ELSE";
        }
    	
    }
    public function userValidation($request)
    {
    	return 
    	$this->validate($request,
    [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed',
    ]);
    }
    public function CompanyAdminValidation($request)
    {
    	return 
    	$this->validate($request,
    [
    	'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed',
        
        'company_name' => 'required',
    ]);
    }

    public function showLoginForm()
    {
    	return view('user.login');
    }

    public function login(Request $request)
    {
    	$this->validate($request,
	    [
	        'email' => 'required',
	        'password' => 'required',
	    ]);

	    $user_data = array(
    			'email' => $request->get('email'), 
    			'password' => $request->get('password')
    		);
	    
    	if(Auth::attempt($user_data))
    	{
    		$user = User::where('email',$request->email)->first();

    		if($user->is_company_admin())
    		{
    			return redirect('/company_admin_dashboard');
    		}
    		else
    		{
    			return redirect('/');
    		}
    	}
    	else
    	{
    		return back()->with('error', 'Wrong Login Details');
    	}

    }


    public function showCompanyAdminDashboard()
    {
    	$var = Auth::user()->id;
    	$company_data = DB::table('users')
    	->join('companies','users.admin_company_id','companies.id')
    	->where('users.id',$var)
    	->select('first_name','last_name','admin','admin_company_id','email','password','company_name')
    	->get();
        
    	$company_posted_jobs = DB::table('jobs')
    	->where('company_id',$company_data[0]->admin_company_id)
        ->orderBy('jobs.created_at', 'desc')
    	->select('id','job_title','job_description','location')
    	->get();

    	return view('company.dashboard',['company_data'=>$company_data, 'company_posted_jobs'=>$company_posted_jobs]);
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }

    public function CompanyAdminPostJob(Request $request)
    {
    	$this->validate($request,
	    [
	        'job_title' => 'required',
	        'job_description' => 'required',
	        'salary' => 'required',
	        'location' => 'required',
	        'country' => 'required',
	        'company_id' => 'required',
	        
	    ]);

	   	$job = new Job;
	   	$job->company_id = $request->input('company_id');
	   	$job->job_title = $request->input('job_title');
	   	$job->job_description = $request->input('job_description');
	   	$job->salary = $request->input('salary');
	   	$job->location = $request->input('location');
	   	$job->country = $request->input('country');
	   	$job->save();

	   	return redirect('/company_admin_dashboard')->with('Status','Job Application Successful');
    }

    public function user_profile()
    {
        $profileInfo = DB::table('users')
        ->where('id',Auth::user()->id )
        ->get();
    	return view('user.userProfile',['profileInfo'=>$profileInfo]);
    }

    public function userUploadsPic(Request $request)
    {
    	$this->validate($request,
    		[
    			'pro_pic_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'id' => 'required',
    		]
    	);
    	$pro_pic_path = $request->file('pro_pic_path');

    	if ($pro_pic_path == null) 
    	{
    	    return redirect('/user-profile')->with('Status','Please Select a jpg/png/gif file');
    	}
    	else
    	{
    	   $path = $request->file('pro_pic_path')->store('images','public');  

    	   $pic_upload_result = DB::table('users')
    	   ->where('id',$request->input('id'))
           ->update(array('pro_pic_path' => $path));

           return redirect('/user-profile')->with('Status','Image Uploaded Sucessfully');
    	}

    	return redirect('/user-profile');
    }

    public function userUploadsCV(Request $request)
    {
        $this->validate($request,
            [
                'CV_path' => 'required',
                'CV_path' => 'mimes:doc,pdf,docx',
                'id' => 'required',
            ]
        );
        $CV_path = $request->file('CV_path');
        if ($CV_path == null) 
        {
            return redirect('/user-profile')->with('Status','Please Select a doc/pdf file');
        }
        else
        {
           $path = $request->file('CV_path')->store('cv','public');  

           $pic_upload_result = DB::table('users')
           ->where('id',$request->input('id'))
           ->update(array('CV_path' => $path));

           return redirect('/user-profile')->with('Status','CV Uploaded Sucessfully');
        }
        return redirect('/user-profile');
    }

    public function applySingleJob($id)
    {
       
        $job = Job::find($id);
        $user = User::find(Auth::user()->id);

        if($user->cv_path==null)
        {
            return redirect('/')->with('Status','Please Upload Your CV First');
        }
        else
        {
            if($job->job_applicant_id==null)
            {
                 $data = array(
                    'job_applicant_id' =>  Auth::user()->id,
                );
                Job::where('id',$id)
                ->update($data);

                return redirect('/')->with('Status','Sucessfully Applied for job');
            }
            else
            {
                $explode =  explode(',',$job->job_applicant_id);
                $explode[] = Auth::user()->id;

                $imp = implode(',',$explode);

                $data = array(
                'job_applicant_id' => $imp
                );

                Job::where('id',$id)
                ->update($data);

                return redirect('/')->with('Status','Sucessfully Applied for job');

            }
        } 
    }

}

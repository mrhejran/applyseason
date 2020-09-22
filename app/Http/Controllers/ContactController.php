<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Model\Blog;
use App\Model\Contact_Messages;
use App\Model\Contact_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$Contact_data = Contact_Messages::orderBy('ID','DESC')->get();
		$Contact_info = Contact_info::whereid(1)->get();
		return view('admin.contact.contact_view',compact('Contact_data','Contact_info'));
	}





	public function Delete($id){
		if(Contact_Messages::whereid($id)->delete()){
			return back()->with('success', 'Blog is Delete successfully.');
		}else{return back()->with('success', 'Blog is Not Delete successfully.');

		}
	}


	public function Update(Request $request){

		$request->validate([
			'address'  => 'required',
			'phonenumber'  => 'required',
			'email'   => 'required',
			'websiteaddress'   => 'required'
		]);


		$data=array(
			'address'           => $request->address,
			'contact_no'       => $request->phonenumber,
			'website_link'       => $request->websiteaddress,
			'email'       => $request->email

		);


		if(Contact_info::where('ID',1)->update($data)){
			return back()->with('success', 'Blog is Update successfully.');
		}else{
			return back()->with('success', 'Blog is Not Update successfully.');;
		}


	}
}

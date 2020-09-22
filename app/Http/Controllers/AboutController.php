<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Model\Blog;
use App\Model\Contact_Messages;
use App\Model\HappyClients;
use App\Model\Contact_info;
use App\Model\Page_Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$Contact_data = Contact_Messages::orderBy('ID','DESC')->get();
		$Contact_info = Contact_info::whereid(1)->get();
		return view('admin.About.About_update',compact('Contact_data','Contact_info'));
	}





	public function Delete($id){
		if(Contact_Messages::whereid($id)->delete()){
			return back()->with('success', 'Blog is Delete successfully.');
		}else{return back()->with('success', 'Blog is Not Delete successfully.');

		}
	}



	public function updatepage(Request $request){
		$request->validate([
			'title'  => 'required',
			'description'  => 'required'
		]);
		$Pageid = request('page_id');

		if($request->file('image_section')){
			$blogImag = $request->file('image_section');
			$ReName_Blog = rand() . '.' . $blogImag->getClientOriginalExtension();
			$blogImag->move(public_path('page_content'), $ReName_Blog);
			$data=array(
				'section_title'             => $request->title,
				'section_img'               => $ReName_Blog,
				'section_description'       => $request->description
			);
		}else{
			$data=array(
				'section_title'             => $request->title,
				'section_description'       => $request->description
			);
		}
		if(Page_Content::where('id',$Pageid)->update($data)){
			return back()->with('success', 'Page is  Update successfully.');
		}else{
			return back()->with('success', 'Page is Not Update successfully.');
		}
	}



	public function clients_store(Request $request){
		$request->validate([
			'title'  => 'required',
			'about'  => 'required',
			'description'   => 'required',
			'clients_img'   => 'required|image'
		]);

		$blogImag = $request->file('clients_img');
		$ReName_Blog = rand() . '.' . $blogImag->getClientOriginalExtension();
		$blogImag->move(public_path('clientImages'), $ReName_Blog);

		$data=array(
			'name'               => $request->title,
			'type'               => $request->about,
			'image'              => $ReName_Blog,
			'description'        => $request->description
		);
		HappyClients::create($data);
		return back()->with('success', 'Client is create successfully.');
	}



	public function clients_delete($id){
		if(HappyClients::whereid($id)->delete()){
			return back()->with('success', 'Client is Delete successfully.');
		}else{return back()->with('success', 'Client is Not Delete successfully.');

		}
	}


	public function clients_update(Request $request){
		$request->validate([
			'title'  => 'required',
			'about'  => 'required',
			'description'   => 'required',
		]);

		$clientid = request('id');

		if($request->file('clients_img')){
			$blogImag = $request->file('clients_img');
			$ReName_Blog = rand() . '.' . $blogImag->getClientOriginalExtension();
			$blogImag->move(public_path('clientImages'), $ReName_Blog);
			$data=array(
				'name'               => $request->title,
				'type'               => $request->about,
				'image'              => $ReName_Blog,
				'description'        => $request->description
			);
		}else{
			$data=array(
				'name'               => $request->title,
				'type'               => $request->about,
				'description'        => $request->description
			);
		}
		if(HappyClients::where('id',$clientid)->update($data)){
			return back()->with('success', 'Client is  Update successfully.');
		}else{
			return back()->with('success', 'Client is Not Update successfully.');
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

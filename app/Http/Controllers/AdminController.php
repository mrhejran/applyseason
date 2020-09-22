<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Model\Blog;
use App\Model\HomePage;
use App\Model\Counter;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function homePage(){

		return view('admin/Home/home_pageSetting');
	}

	public function Update(Request $request){

		$request->validate([
			'pagetitle'   => 'required',
			'sitetitle'   => 'required',
			'slidetitle'  => 'required',
			'aboutdes'    => 'required',
			'subcribdes'  => 'required',
		]);
		$Pageid = 1;

		if($request->file('image_section')){
			$blogImag = $request->file('image_section');
			$ReName_Blog = rand() .'H.' . $blogImag->getClientOriginalExtension();
			$blogImag->move(public_path('page_content'), $ReName_Blog);

			$data=array(
				'page_title'         => $request->pagetitle,
				'slide_title'        => $request->slidetitle,
				'slide_logo'         => $request->sitetitle,
				'slide_about'        => $request->aboutdes,
				'slide_subscrib'     => $request->subcribdes,
				'slide_imge'         => $ReName_Blog
			);
		}else{
			$data=array(
				'page_title'         => $request->pagetitle,
				'slide_title'        => $request->slidetitle,
				'slide_logo'         => $request->sitetitle,
				'slide_about'        => $request->aboutdes,
				'slide_subscrib'     => $request->subcribdes
			);
		}
		if(HomePage::where('id',$Pageid)->update($data)){
			return back()->with('success', 'Page is  Update successfully.');
		}else{
			return back()->with('success', 'Page is Not Update successfully.');
		}
	}


	public function Update_Counter(Request $request){
		$request->validate([
			'jobs'   => 'required',
			'members'   => 'required',
			'resume'  => 'required',
			'company'    => 'required'
		]);

		$data=array(
			'cout_Jobs'           => $request->jobs,
			'cout_Members'        => $request->members,
			'cout_Resume'         => $request->resume,
			'cout_Company'        => $request->company
		);

		if(Counter::where('id',1)->update($data)){
			return back()->with('success', 'Counter is  Update successfully.');
		}else{
			return back()->with('success', 'Counter is Not Update successfully.');
		}
	}
	
}

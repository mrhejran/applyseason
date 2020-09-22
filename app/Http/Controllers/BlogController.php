<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Model\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Image;

class BlogController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{

		$blog_data = blog::orderBy('ID','DESC')->get();
		return view('admin.blog.blog_list',compact('blog_data'));
	}


	public function create()
	{
		return view('admin.blog.create_blog');
	}


	public function store(Request $request){

		$request->validate([
			'title'  => 'required',
			'date'  => 'required',
			'description'   => 'required',
			'blogimage'    => 'required|image'
		]);

		$blogImag = $request->file('blogimage');
		$ReName_Blog = rand() . '.' . $blogImag->getClientOriginalExtension();
		$blogImag->move(public_path('blogImages'), $ReName_Blog);





//		$resize_image = Image::make($blogImag->getRealPath());
//
//		$resize_image->resize(150, 150, function($constraint){
//			$constraint->aspectRatio();
//		})->save(public_path('blogImages'), $ReName_Blog);
//
//
//		$blogImag->move(public_path('blogImages'), $ReName_Blog);


		$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->title)).'-'.str_random(2);
		$data=array(
			'TITLE'           => $request->title,
			'B_URL'           => $slug,
			'DATE_BLOG'       => $request->date,
			'AUTH_BLOG'       => 'Admin',
			'DEC_BLOG'        => $request->description,
			'IMG_BLOG'        => $ReName_Blog,
			'STATUS_BLOG'     => 1
		);

		Blog::create($data);

		return back()->with('success', 'Blog is create successfully.');
	}


	public function Delete($id){
		if(Blog::whereid($id)->delete()){
			return back()->with('success', 'Blog is Delete successfully.');
		}else{return back()->with('success', 'Blog is Not Delete successfully.');

		}
	}

	public function Edit($id){
		$blog_data = blog::whereid($id)->get();
		return view('admin.blog.edit_blog',compact('blog_data'));
	}

	public function Update(Request $request){

		$request->validate([
			'title'  => 'required',
			'date'  => 'required',
			'description'   => 'required',
		]);

		$Blogid = request('id');
		$slug=preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->title)).'-'.str_random(2);
		if($request->file('blogimage')){

			$blogImag = $request->file('blogimage');
			$ReName_Blog = rand() . '.' . $blogImag->getClientOriginalExtension();
			$blogImag->move(public_path('blogImages'), $ReName_Blog);


			$data=array(
				'TITLE'           => $request->title,
				'B_URL'           => $slug,
				'DATE_BLOG'       => $request->date,
				'AUTH_BLOG'       => 'Admin',
				'DEC_BLOG'        => $request->description,
				'IMG_BLOG'        => $ReName_Blog,
				'STATUS_BLOG'     => 1
			);

		}else{
			$data=array(
				'TITLE'           => $request->title,
				'B_URL'           => $slug,
				'DATE_BLOG'       => $request->date,
				'AUTH_BLOG'       => 'Admin',
				'DEC_BLOG'        => $request->description,
				'STATUS_BLOG'     => 1
			);
		}
		
		if(Blog::where('ID',$Blogid)->update($data)){
			return Redirect('blog_List')->with('success', 'Blog is Update successfully.');
		}else{
			return back()->with('success', 'Blog is Not Update successfully.');;
		}


	}
}

<?php

namespace App\Http\Controllers;

use App\Model\ProfessorData;
use App\Model\Contact_Messages;
use App\Model\Blog;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use WebDevEtc\BlogEtc\Models\BlogEtcCategory;
use WebDevEtc\BlogEtc\Models\BlogEtcPost;
use WebDevEtc\BlogEtc\Models\BlogEtcComment;
use Auth;
use App\reply_comment;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }
    public function main(){
        $data = "";
        $Block_Blog=BlogEtcPost::orderBy('id','desc')->paginate(3);
        // $desc = DB::select("SELECT DISTINCT * FROM professor_data ORDER BY 1 DESC");
        $desc = DB::select("SELECT MIN(id) AS id, disciplines FROM professor_data GROUP BY disciplines ORDER BY 1 DESC");
        $univ = DB::select("SELECT MIN(id) AS id, university FROM professor_data GROUP BY university ORDER BY 1 DESC");

        return view('user.index',['desc'=>$desc,'univ'=>$univ,'data'=>$data,'Block_Blog'=>$Block_Blog]);
    }
    public function job_post()
    {
        return view('user.job-post');
    }
    public function new_post()
    {
        return view('user.new-post');
    }
    public function about()
    {
        return view('user.about');
    }
    public function blog_single(BlogEtcPost $post,$slug)
    {
        $data['category']=BlogEtcCategory::orderBy('id','desc')->paginate(6);
        $data['recent_post']=BlogEtcPost::orderBy('id','desc')->paginate(3);
        $data['seo_title']=BlogEtcPost::orderBy('id','desc')->paginate(16);
        $data['blog_data'] = BlogEtcPost::where('id',$post->id)->first();
        // $data['blogs_data'] = BlogEtcPost::find($post->id)->get();
        return view('user.blog-single',$data);
    }
    public function blogs()
    {
        $data['Block_Blog']=BlogEtcPost::orderBy('id','desc')->paginate(12);
        return view('user.blog',$data);
		
    }
    public function commentStore(Request $request,$post){
         $this->validate($request,[
            'author_email' => 'required',
	    'author_name'=>'required',
        ]);
	
        $comment = new BlogEtcComment();
        $comment->blog_etc_post_id = $post;
	$comment->user_id = Auth::id();
        $comment->author_name=$request->author_name;
	$comment->author_email=$request->author_email;
        $comment->comment = $request->comment;
        $comment->author_website = $request->author_website;
        $comment->save();
        
        return redirect()->back();
    }
    public function commentReply(Request $request,$post){
        $this->validate($request,[
            'comment' => 'required'
        ]);

        $comment_reply = new reply_comment();
        $comment_reply->blog_etc_post_id = $post;
        $comment_reply->user_id = Auth::id();
        $comment_reply->comment = $request->comment;
        $comment_reply->save();
        // Toastr::success('Comment Successfully Published :)','Success');
        return redirect()->back();
    }
    
    public function contact()
    {
        return view('user.contact');
    }
    public function search_job($keyword = '')
    {
        $data = '';
        if(Input::has('keyword'))
        {
            $keyword = Input::get('keyword');
            $data = ProfessorData::where('sub_disciplines1', 'LIKE', "%{$keyword}%")->orWhere('sub_disciplines2', 'LIKE', "%{$keyword}%")->orWhere('sub_disciplines3', 'LIKE', "%{$keyword}%")->orWhere('sub_disciplines4', 'LIKE', "%{$keyword}%")->orWhere('disciplines', 'LIKE', "%{$keyword}%")->get()->take(10);
        }
        $desc = DB::select("SELECT MIN(id) AS id, disciplines FROM professor_data GROUP BY disciplines ORDER BY 1 DESC");
        $univ = DB::select("SELECT MIN(id) AS id, university FROM professor_data GROUP BY university ORDER BY 1 DESC");
        
        return view('user.search-job',['desc'=>$desc,'univ'=>$univ],compact('data'));
    }

    public function messageSave(Request $request){

		$request->validate([
			'name'      =>  'required',
			'email'     =>  'required',
			'subject'   =>  'required',
			'messages'  =>  'required'
		]);

		$messages= new Contact_Messages();

		$data['name']     = $request->name;
		$data['email']    = $request->email;
		$data['subject']  = $request->subject;
		$data['messages'] = $request->messages;
		$data['stauts']   = 1;

		if($messages->create($data)){
			return back()->with('success', 'Thanks for Contact.');
		}else{
			return back()->with('success', 'Thanks for Contact.');
		}


	}
    
    public function showTableData(Request $request)
    {
        $keyword = $request->keyword;
        $data = '';

        if($keyword != '')
        {
            $data = ProfessorData::where('sub_disciplines1', 'LIKE', "%{$keyword}%")->orWhere('sub_disciplines2', 'LIKE', "%{$keyword}%")->orWhere('sub_disciplines3', 'LIKE', "%{$keyword}%")->orWhere('sub_disciplines4', 'LIKE', "%{$keyword}%")->orWhere('disciplines', 'LIKE', "%{$keyword}%")->get()->take(10);

            $Block_Blog=BlogEtcPost::orderBy('id','desc')->paginate(3);
       
        }
        $desc = DB::select("SELECT MIN(id) AS id, disciplines FROM professor_data GROUP BY disciplines ORDER BY 1 DESC");
        $univ = DB::select("SELECT MIN(id) AS id, university FROM professor_data GROUP BY university ORDER BY 1 DESC");

        return view('user.index',['desc'=>$desc,'univ'=>$univ,'Block_Blog'=>$Block_Blog],compact('data'));
    }    
    

}

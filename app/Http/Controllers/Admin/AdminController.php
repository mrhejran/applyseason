<?php

namespace App\Http\Controllers\Admin;

use DB;
use Excel;
use App\Model\ProfessorData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$professor_data = ProfessorData::all();
		$users = DB::select("SELECT * FROM users ORDER BY 1 DESC");
		$new_users = count($users);
		$new_msgs = DB::select("SELECT * FROM messages WHERE status = 1 ORDER BY 1 DESC");
		$new_msggs = count($new_msgs);
		$new_register_users = DB::select("SELECT * FROM users WHERE status = 1 ORDER BY 1 DESC");
		$new_users_register = count($new_register_users);
		$clicks = DB::select("SELECT clicks FROM seemore");
		$db_clicks = $clicks[0]->clicks;
		return view('admin.dashboard',['new_users'=>$new_users,'new_msgs' => $new_msgs, 'new_msggs'=>$new_msggs,'new_users_register'=>$new_users_register, 'db_clicks'=>$db_clicks],compact('professor_data'));
	}
	public function import_excel(Request $request)
	{
		$this->validate($request, [
			'select_file'  => 'required|mimes:xls,xlsx'
		]);

		$path = $request->file('select_file')->getRealPath();

		$data = Excel::load($path)->get();

		if($data->count() > 0)
		{
			foreach($data->toArray() as $key => $value)
			{
				foreach($value as $row)
				{
					$insert_data[] = array(
						'university'  => trim($row['university']),
						'name'   => trim($row['name']),
						'email'   => trim($row['email']),
						'phone'    => trim($row['phone']),
						'research_interests'  => trim($row['research_interests']),
						'disciplines'   => trim($row['disciplines']),
						'sub_disciplines1'   => trim($row['sub_disciplines_1']),
						'sub_disciplines2'   => trim($row['sub_disciplines_2']),
						'sub_disciplines3'   => trim($row['sub_disciplines_3']),
						'sub_disciplines4'   => trim($row['sub_disciplines_4']),
					);
				}
			}

			if(!empty($insert_data))
			{
				DB::table('professor_data')->insert($insert_data);
			}
		}
		return back()->with('success', 'Excel Data Imported successfully.');
	}
	public function mark_read(Request $request){
		DB::table('messages')->update(['status' => 0]);
		return redirect('/admin');
	}
	public function mark_read_user(Request $request){
		DB::table('users')->update(['status' => 0]);
		return redirect('/admin');
	}
	public function admin_messages(Request $request){
		$users = DB::select("SELECT * FROM users ORDER BY 1 DESC");
		$new_users = count($users);
		$new_msgs = DB::select("SELECT * FROM messages WHERE status = 1 ORDER BY 1 DESC");
		$new_msggs = count($new_msgs);
		$all_msgs = DB::select("SELECT * FROM messages ORDER BY 1 DESC");
		$all_msgs_count = count($all_msgs);
		return view('admin.messages',['new_users_register'=>$new_users,'new_msgs' => $new_msgs, 'new_msggs'=>$new_msggs, 'all_msgs' => $all_msgs, 'all_count' => $all_msgs_count]);
	}

}
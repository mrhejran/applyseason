<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('user.index');
// })->name('/');
Route::get('/', 'HomeController@main')->name('/');
// Route::get('{keyword}', 'HomeController@search_job')->name('search.job');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/job-post', 'HomeController@job_post')->name('job-post');

Route::get('/search-job', 'HomeController@search_job')->name('search-job');

Route::get('/new-post', 'HomeController@new_post')->name('new-post');

Route::get('/about', 'HomeController@about')->name('about');
Route::group(['middleware'=>['auth']], function (){
    Route::post('comment/{post}','HomeController@commentStore')->name('comment.store');
    Route::post('comment-reply/{post}','HomeController@commentReply')->name('comment.reply');
 });


Route::get('/blogs', 'HomeController@blogs')->name('blogs');
Route::get('/blog-single/{post}/{slug}', 'HomeController@blog_single')->name('blogsingle');
Route::get('/contact', 'HomeController@contact')->name('contact');


//Admin Routes
Route::get('admin-login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');

Route::post('admin-login','Admin\Auth\LoginController@login');

Route::get('admin','Admin\AdminController@index')->name('admin');
Route::get('/mark_read','Admin\AdminController@mark_read');
Route::get('/mark_read_user','Admin\AdminController@mark_read_user');
Route::get('/admin_messages','Admin\AdminController@admin_messages')->name('admin.message');

Route::post('import_excel','Admin\AdminController@import_excel')->name('import_excel');

Route::get('/logout', function(){
    Artisan::call('cache:clear');
    return App::call('\App\Http\Controllers\Auth\LoginController@logout');
});

//Blog Routes
Route::get('/blog_List','BlogController@index')->name('blog_controller');
Route::get('/Create_blog','BlogController@create')->name('blog_controller');
Route::post('/upload_blog','BlogController@store')->name('blog_controller');
Route::get('/Delete_Blog/{id}','BlogController@Delete')->name('blog_controller');
Route::get('/Edit_Blog/{id}','BlogController@Edit')->name('blog_controller');
Route::post('/update_blog','BlogController@Update')->name('blog_controller');

//Contact Routes
Route::post('/saveMessage','HomeController@messageSave')->name('home');
Route::get('/Contact_list','ContactController@index')->name('home');
Route::get('/Delete_message/{id}','ContactController@Delete')->name('home');
Route::post('/update_contact','ContactController@Update')->name('home');

//About Routes
Route::get('/About_list','AboutController@index')->name('About_controller');
Route::post('/update_page_content','AboutController@updatepage')->name('About_controller');
Route::post('/create_clients','AboutController@clients_store')->name('About_controller');
Route::get('/Delete_client/{id}','AboutController@clients_delete')->name('About_controller');
Route::post('/update_clients','AboutController@clients_update')->name('About_controller');


//Home Routes
Route::get('/Home_list','AdminController@homePage')->name('HomePage');
Route::post('/update_home_content','AdminController@Update')->name('HomePage');
Route::post('/update_counter','AdminController@Update_Counter')->name('HomePage');


Route::post('ckeditor/image_upload', 'BlogEtcAdminController@upload')->name('upload');

//User Panel Routes
Route::post('/user-register', 'userController@registerFunction')->name('user.register');
Route::post('/user-login', 'userController@loginFunction')->name('user.login');
Route::get('/seemore', 'userController@seemore');

Route::group(['middleware'=>['customAuth']], function (){
    Route::get('/user-logout', 'userController@logout')->name('user.logout');
	Route::get('/user-panel', 'userController@user_dashboard')->name('user.dashboard');
	Route::get('/user__panel', 'userController@user__panel');
	Route::get('/user-ticket', 'userController@user_ticket')->name('user.ticket');
	Route::post('/send_message', 'userController@send_message')->name('send.message');
 });

Route::post('/','HomeController@showTableData');
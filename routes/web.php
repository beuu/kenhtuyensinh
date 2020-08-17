<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/danhmuccon', function () {
    return view('fe.cate.index');
});
Route::get('/post', function () {
    return view('fe.post.index');
});

Route::get('/blog', function () {
    return view('fe.cate.blog');
});

Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix'=>'wp-admin','middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
    Route::get('export', 'ExportController@export')->name('export');
    Route::resource('user','Backend\UserController');
    //newcate
    Route::resource('postcate', 'Backend\CategoryController');
    //newcate
    Route::resource('roles', 'Backend\RoleController');
    Route::resource('post', 'Backend\PostController');
    //Page
    Route::resource('page', 'Backend\PageController');
    Route::resource('tag', 'Backend\TagController');
    Route::resource('comment', 'Backend\CommentController');
    Route::get('/menu', array('as' => 'menu', 'uses' => 'Backend\MenuController@index'));
    Route::post('/addcustommenu', array('as' => 'haddcustommenu', 'uses' => 'Backend\MenuController@addcustommenu'));
    Route::post('/deleteitemmenu', array('as' => 'hdeleteitemmenu', 'uses' => 'Backend\MenuController@deleteitemmenu'));
    Route::post('/deletemenug', array('as' => 'hdeletemenug', 'uses' => 'Backend\MenuControllerMenuController@deletemenug'));
    Route::post('/createnewmenu', array('as' => 'hcreatenewmenu', 'uses' => 'Backend\MenuController@createnewmenu'));
    Route::post('/generatemenucontrol', array('as' => 'hgeneratemenucontrol', 'uses' => 'Backend\MenuController@generatemenucontrol'));
    Route::post('/updateitem', array('as' => 'hupdateitem', 'uses' => 'Backend\MenuController@updateitem'));
});

Route::get('/{slug}', 'HomeController@allslug')->name('allslug');

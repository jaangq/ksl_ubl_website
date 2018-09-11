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
Route::get('/lang/in', function (Illuminate\Http\Request $request) {
      $request->session()->forget('lang');
});
Route::get('/lang/en', function () {
      session(['lang' => '_en']);
});

Route::get('/', function () {
    $data['home'] = App\AdminModel\Pages::where('name_en', 'home')->get()[0]->website_text;
    $data['categories'] = App\AdminModel\Categories::all();
    $data['posts'] = App\AdminModel\Posts::where('id_post_status', '1')->orderBy('created_at', 'DESC')->limit(6)->get();
    return view('home')->with('data', $data);
});
Route::get('/posts', 'PostsController@index');
Route::get('/posts/news-only', 'PostsController@newsOnly');
Route::get('/posts/lessons-only', 'PostsController@lessonsOnly');
Route::get('/posts/popular', 'PostsController@popular');
Route::get('/posts/most-viewed', 'PostsController@mostViewed');
Route::get('/posts/tags/{search?}', 'PostsController@tags');
Route::post('/posts/{search?}', 'PostsController@search');

Route::get('/news/{post}', 'NewsController@index');

Route::get('/news', function () {
  // ini ga dipake
    $paginatenya = App\AdminModel\Website_text::paginate(1);
    return view('news', ['paginatenya' => $paginatenya]);
});
Route::get('/lessons/{cat}/{subcat}/{subsubcat?}/{slug_title?}', 'LessonsController@index');

Route::get('/lessons/{cat}', function ($cat) {
  $data['categories'] = App\AdminModel\Categories::where('name_en', $cat)->get();
  $data['posts'] = $data['categories'][0]->posts;
  return view('lesson_list')->with('data', $data);
});
Route::get('/lessons', function () {
  $data['lessons'] = App\AdminModel\Pages::where('name_en', 'lessons')->get()[0]->website_text;
  $data['categories'] = App\AdminModel\Categories::all();
  return view('lessons')->with('data', $data);
});
Route::get('/about', function () {
  $data['about'] = App\AdminModel\Pages::where('name_en', 'about')->get()[0]->website_text;
  return view('about')->with('data', $data);
});
Route::get('/contact', function () {
  $data['contact'] = App\AdminModel\Pages::where('name_en', 'contact')->get()[0]->website_text_without_sosmed;
  return view('contact')->with('data', $data);
});
Route::get('hello', function() {
    return view('hello');
});




















// Admin Routes

// Admin Auth Routes
App\CustomRoutes\Router::AdminAuth();

// Admin Profile Information
Route::resource('/ksl/admin/profile-information', 'Admin\ProfileInformationController')->only([
  'index', 'update'
])->middleware('auth');

// Admin Pages
Route::put('/ksl/admin/pages/{update}', 'Admin\PagesController@update');
Route::get('/ksl/admin/pages/{page}', 'Admin\PagesController@index')->middleware('auth');


// Admin Categories
Route::resource('/ksl/admin/categories', 'Admin\CategoriesController')->only([
  'index', 'store', 'destroy', 'update', 'search'
])->middleware('auth');

// Admin Sub Categories
Route::get('/ksl/admin/sub-categories/search', 'Admin\SubCategoriesController@search');
Route::resource('ksl/admin/sub-categories', 'Admin\SubCategoriesController')->only([
  'index', 'show', 'store', 'destroy', 'update'
])->middleware('auth');

// Admin Sub Sub Categories
Route::get('/ksl/admin/sub-sub-categories/search', 'Admin\SubSubCategoriesController@search');
Route::resource('ksl/admin/sub-sub-categories', 'Admin\SubSubCategoriesController')->only([
  'index', 'show', 'store', 'destroy', 'update'
])->middleware('auth');

// Admin Users
Route::resource('/ksl/admin/users', 'Admin\UsersController')->only([
  'index', 'store', 'destroy', 'update', 'search'
])->middleware('auth');

// Admin Tags
Route::resource('/ksl/admin/tags', 'Admin\TagsController')->only([
  'index', 'store', 'destroy', 'update', 'search'
])->middleware('auth');

// Admin Post
Route::resource('/ksl/admin/posts', 'Admin\PostsController')->only([
  'index', 'store', 'destroy', 'update', 'search'
])->middleware('auth');


// Admin Upload Files
Route::post('/ksl/admin/upload_files/add', function(Illuminate\Http\Request $request) {
  $jsData = json_decode($request->input('jsData'));
  foreach ($jsData as $data) {
    $upFile = new App\AdminModel\Uploaded_files;
    $upFile->name = $data->name;
    $upFile->mime = $data->mime;
    $upFile->size = $data->size;
    $upFile->hash = $data->hash;
    $upFile->id_users = Auth::user()->id;
    $upFile->save();
  }
});
Route::delete('/ksl/admin/upload_files/destroy', function(Illuminate\Http\Request $request) {
  $jsData = json_decode($request->input('jsData'));
  foreach ($jsData as $data) {
    $kumpulanFile = App\AdminModel\Uploaded_files::where('hash', $data)->get();
    foreach ($kumpulanFile as $file) {
      $rmFile = App\AdminModel\Uploaded_files::find($file->id);
      $rmFile->delete();
    }
  }
});

// Default Admin LogIn to Dashboard
Route::get('/ksl/admin/{dashboard?}', function(){
  $data['pages'] = App\AdminModel\Pages::getAllPages();
  return view('admin/dashboard', $data);
})->middleware('auth');



// Testing Routes
Route::get('/test', function() {

  // Example -- Sunday, September 9, 2018, 6:34 AM
  echo KSLLinking::linking('lessons', 'uyot', 'sad', 'wdad');
  echo date("Y/m/d", strtotime('2018-09-08 17:19:56') );
});

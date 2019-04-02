<?php

//use App\Task;
//View => view();
//Request=>request();
//App =>app();
//Auth=>auth();
//Service Binding
//when an instance of  App\Billing\Stripe class is requested, call the callback function/closure and return  what is in the callback function eg new instance of \App\Billing\Stripe
//config('services.stripe.secret') - (services file, stripe array, secret key
//Register into the container
/**A
 * pp::bind('App\Billing\Stripe', function() {
    return new \App\Billing\Stripe(config('services.stripe.secret'));
});
 This returns the same instance regardless of how many times you call the instance.
 * App::singleton('App\Billing\Stripe', function() {
    return new \App\Billing\Stripe(config('services.stripe.secret'));
});


//resolve it out of the container
$stripe = resolve('App\Billing\Stripe'); //App::make('App\Billing\Stripe'); or app('App\Billing\Stripe');


//**///dd(resolve('App\Billing\Stripe'));
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

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/tasks/{task}', function($id) {
//
////    $task = DB::table('tasks')->find($id); //DB Query Builder
//    $task = Task::find($id); // Eloquent
//    Task::incomplete();
//    return view('tasks.show', compact('task'));
//});
/* * ***************** */


//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

//Route::get('/', 'PostsController@index')->name('home');
Route::get('/home', 'PostsController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('home');
//controller = PostsController, Model = Post, Migration=>create_post_table, Migrate
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/tags/{tag}','PostsController@index');

Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'CommentsController@store');
//Your own authentication
//create registration form
Route::get('/register', 'RegistrationController@create');
//Register User
Route::post('/register', 'RegistrationController@store');
//create login form
Route::get('/login', 'SessionsController@create');
//login - 
Route::post('/login', 'SessionsController@store');

//logout
Route::get('/logout', 'SessionsController@destroy');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use App\Repositories\Posts;

class PostsController extends Controller {

    //
    public function __construct() {

        $this->middleware('auth')->except(['index', 'show']);
    }

//    public function index(Posts $posts) {
    public function index(Tag $tag = null) {

//        return $tag->posts;;
        /** Method One for Filtering 
          $posts = Post::latest();
          if($month=request('month')){
          $posts->whereMonth('created_at',Carbon::parse($month)->month);
          }
          if($year=request('year')){
          $posts->whereYear('created_at',$year);
          }
          $posts=$posts->get();
         * */
        /*         * Method Two using scope Method in Post (Filter) * */
        $posts = Post::latest()->filter(request([
                    'month',
                    'year'
                ]))->get();
//         * */
//        $posts = $posts->all();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
//        $post=Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
//        dd(request(['title','body']));
        /** METHOD ONE OF SAVING TO DB
          //create a new post using Request Data
          $post = new Post;
          $post->title = request('title');
          $post->body = request('body');
          //Save it to DB
          $post->save();

         * */
        /** METHOD 2 OF SAVING TO DB */
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->user()->id, //OR auth()->id()
        ]);


        //Method 3 from the user model
//        dd(Auth::user());
//        auth()->user()->publish(
//                new Post(request(['title', 'body']))
//        );
        session()->flash('message', 'Your post has now been published');
        //Then add redirect to Homepage
        return redirect('/posts');
    }

}

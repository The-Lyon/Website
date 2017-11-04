<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $posts = Post::all();
        return $posts;
    }

    /**l
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        
        if(null===($request->playlist)) {
            $this->validate($request,array(
                'title'=> 'required|max:255',
                'body'=>'required',
                'intro'=>'required|max:225',
                'headImg'=>'required',
                'author'=>'required'
            ));
        }else{
            $this->validate($request,array(
                'title'=> 'required|max:255',
                'body'=>'required',
                'author'=>'required'
            ));
        };
        
        //$user= middleware('auth');;
        
        //Store in DB
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author = $request->author;
        $post->intro = $request->intro;
        
        if(isset($request->sport)){
            $post->sport = "true";
        }elseif(isset($request->article)){
            $post->sport = "article";
        }else{
            $post->sport = "false";
        }
        
        //If not playlist post
        if(!isset($request->playlist)){            
            //Create Directory for res Img
            $id = \DB::table('posts')->max('id');
            $id = $id +1;
            mkdir("img/posts/".$id,0777,true);
        
            //Move head image to directory
            $head = $request->file('headImg');
            $fileType = $head->getClientOriginalExtension();
            $head->move("img/posts/".$id, "head".".".$fileType);   
        }else{
            $post->sport="playlist";
        } 
        
        //Save
        $post->save();
        
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        //Redirect
        return view('show')->withPost($post)->withTitle($post->title);
    }
    
    public static function recent(){
        $x = 0;
        do{
            $id = \DB::table('posts')->max('id');
            $id = $id -$x;
            $post = Post::find($id);
            $x++;
        }while($post->sport =="playlist");
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

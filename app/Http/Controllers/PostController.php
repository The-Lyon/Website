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
        return $posts->reverse();
    }

    /**l
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        if(isset($request->email)){
            $headers = 'From: webmaster@example.com' . "\r\n" .
       'Reply-To: webmaster@example.com';
                            mail("mailtelenko@gmail.com","LO Contact - ".$request->name,$request->message." - ".$request->email, $headers);
            return view("contact")->withSent("true");
        }else{
        if($request->type != "Playlist") {
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
        
        if($request->type == "Sport"){
            $post->sport = "true";
        }elseif($request->type == "Article"){
            $post->sport = "article";
        }elseif($request->type =="News"){
            $post->sport = "false";
        }else{
            $post->sport = "playlist";
        }
        
               //Save
        $post->save();
        
        //If not playlist post
        if($request->type != "Playlist"){            
            //Create Directory for res Img
            $id = \DB::table('posts')->max('id');
            mkdir("img/posts/".$id,0777,true);
        
            //Move head image to directory
            $head = $request->file('headImg');
            $fileType = $head->getClientOriginalExtension();
            $head->move("img/posts/".$id, "head".".".$fileType);   
        }else{
            $post->sport="playlist";
        } 
        
        return redirect()->route('posts.show', $post->id);
        }
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
        $post = Post::find($id);
        return view("lumino/postEdit")->withPost($post);
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
        if (isset($request->featured)){
            $post = Post::find($id);
            if($post->featured == "true"){
            $post->featured = "false";
            }else{
                $post->featured = "true";
            }
            $post->save();
        }else{
        
        $this->validate($request,array(
                'title'=> 'required|max:255',
                'body'=>'required',
                'intro'=>'required|max:225',
                'author'=>'required'
        ));
        
        
        $post = Post::find($id);
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->intro = $request->intro;
        $post->author = $request->author;
        
        if($request->type == "Sport"){
            $post->sport = "true";
        }elseif($request->type == "Article"){
            $post->sport = "article";
        }elseif($request->type =="News"){
            $post->sport = "false";
        }
        
        $post->save();
        
        if (isset($post->headImg)){
            //Move head image to directory
            $head = $request->file('headImg');
            $fileType = $head->getClientOriginalExtension();
            $head->move("img/posts/".$id, "head".".".$fileType);   
        }
        }
        return view("lumino/posts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        $directory = 'img/posts/'.$id;
        foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
        rmdir($directory);
        return view('lumino/posts');
    }
}

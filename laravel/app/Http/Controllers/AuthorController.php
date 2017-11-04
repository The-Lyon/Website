<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $authors = Author::all();
        return $authors;
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
        $this->validate($request,array(
            'author'=> 'required|max:255',
            'bio'=>'required|max:400',
            'position'=>'required',
            'year'=>'required'
        ));
        
        //$user= middleware('auth');;
        
        //Store in DB
        $author = new Author;
        $author->author = $request->author;
        $author->bio = $request->bio;
        $author->position = $request->position;
        $author->year = $request->year;
        
        //Move profile image to directory
        $head = $request->file('profilePic');
        $fileType = $head->getClientOriginalExtension();
        $head->move("img/staff/",$author->author.".".$fileType);       
        
        //Save
        $author->save();
        
       return redirect()->route('authors.show', $author->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    public function show($id){
        $author = Author::find($id);
        
        $posts = Post::all();
        
        //Redirect
        return view('showAuthor')->withAuthor($author)->withTitle($author->author)->withPost($posts);
    }
    
    public static function nameFind($name){
        $author = \DB::table('authors')->where('author', $name)->pluck('id');
        
        return $author[0];
    }
    
    public static function showAll()
    {
        $items = \DB::table('authors')->pluck("author");
        return $items;
    }
    
    public static function recent(){
        $id = \DB::table('posts')->max('id');
        $post = Post::find($id);
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

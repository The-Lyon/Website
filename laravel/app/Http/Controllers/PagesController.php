<?php

namespace App\Http\Controllers;

class PagesController extends Controller{
    public function getIndex(){
        return view('welcome')->withTitle('Home');
    }
    
    public function getCreatePost(){
        return view('create-post')->withTitle('New Post');
    }
    
    public function getNews(){
        return view('news')->withTitle("News");
    }
    
    public function getCreateUser(){
        return view('create-user')->withTitle('New Executive');
    }
    
    public function getAbout(){
        return view('about')->withTitle("About");
    }
    
    public function getSports(){
        return view('sports')->withTitle("Sports");
    }
    
    public function getPlaylists(){
        return view('playlists')->withTitle("Playlists");
    }
    
    public function getAdmin(){
        return view('/lumino/index');
    }
    
    public function getAdminPost(){
        return view("/lumino/posts");
    }
    
    public function getArticles(){
        return view("/articles")->withTitle("Articles");
    }
    
    public function getContact(){
        return view("/contact")->withTitle("Contact");
    }
    
}

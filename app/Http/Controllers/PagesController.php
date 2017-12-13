<?php

namespace App\Http\Controllers;

class PagesController extends Controller{
    public function getIndex(){
        return view('welcome')->withTitle('Home');
    }
    
    public function getNews(){
        return view('news')->withTitle("News");
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
    
    public function getAdminUser(){
        return view("/lumino/users");
    }
    
    public function getArticles(){
        return view("/articles")->withTitle("Articles");
    }
    
    public function getContact(){
        return view("/contact")->withTitle("Contact");
    }
    
    public function error404(){
        return view("/errors/error404")->withTitle("Error!");
    }
    
    public function getRegister(){
        return view("/auth/newRegister")->withTitle("Register");
    }
    
}

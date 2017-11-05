
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

Route::get('/', 'PagesController@getIndex');

Route::get("/news", 'PagesController@getNews');

Route::get('/about', 'PagesController@getAbout');

Route::get("/sports", "PagesController@getSports");

Route::get("/playlists","PagesController@getPlaylists");

Route::get("/admin", ['uses' => 'PagesController@getAdmin', 'middleware' => 'auth']);

Route::get("/admin/post", ['uses' => 'PagesController@getAdminPost', 'middleware' => 'auth']);

Route::get("/admin/users", ['uses' => 'PagesController@getAdminUser', 'middleware' => 'auth']);

Route::get("/social", "PagesController@getSocial");

Route::get("/articles", "PagesController@getArticles");

Route::get("/contact", "PagesController@getContact");

Route::get("/error404", "PagesController@error404");

Route::get("/home", ['uses' => 'PagesController@getAdmin', 'middleware' => 'auth']);

Route::resource('posts','PostController');

Route::resource('authors','AuthorController');

Auth::routes();

Route::any('/search',function(){
    $search = \Input::get ( 'query' );
    $searchPost = \App\Post::where('title','LIKE','%'.$search.'%')->orWhere('author','LIKE','%'.$search.'%')->get();
    $articleType = \Input::get('type');
    if($articleType == 1){
        $returnView = "news";
    }elseif($articleType == 2){
        $returnView = "sports";
    }elseif($articleType == 4){
        $returnView = "articles";
    }else{
        $returnView = "playlists";
    }
    if(count($searchPost) > 0)
        return view($returnView)->withSearch($searchPost)->withQuery($search);
    else return view ($returnView)->withMessage('No posts found')->withQuery($search);
});

<?php

namespace App\Http\Controllers;

use App\Article;
#use Illuminate\Http\Request;
use Request;

use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class ArticlesControlles extends Controller
{
	public function __construct(){
		$this->middleware('auth',['only'=>'create']); 
	}

    public function index() {
    	//return \Auth::user()->name;
	   // $articles = Article::all();
       // $articles = Article::latest('published_at')->get();
       // $articles = Article::latest('published_at')->where('published_at','<=',Carbon::now())->get();
	    $articles = Article::latest('published_at')->published()->get();
		
        return view('articles.index', compact('articles'));
       //$articles = Article::order_by('published_at','desc')->get(); // !1 not work
		//return view('articles.index')->with('articles',$articles);
	    //return $articles;
    }

    function show(Article $article) {
    	//dd($article);
    	/*$article = Article::find($id);
    	if(is_null($article)){
    		abort(404);
    	}*/
    //	$article = Article::findOrFail($id);
    	return view('articles.show', compact('article'));
    }

    function create() {
        $tags = \App\Tag::lists('name','id');
    	return view('articles.create', compact('tags'));
    }

    function store(Requests\CreateArticleRequest $request) {

       // dd($request->input('tags'));
    	//$input = Request::get('title');
    	/*$input = Request::all();
    	$input['published_at'] = Carbon::now();
    	Article::create($input);
    	return redirect('articles');*/
       // Article::create(Request::all());
       
      /*  Article::create($request->all());
        return redirect('articles');   */  

		/*$article = new Article($request->all()); //user-id
        Auth::user()->articles()->save($article);  */

        //\Session::flash('flash_message','You article has bennd creted!');
       /* session()->flash('flash_message','You article has bennd creted!');

        return redirect('articles');*/

        /*return redirect('articles')->with([
            'flash_message','You article has bennd creted!',
            'flash_message_important',true
        ]);*/

        //flash()->success('You article has bennd creted!');
        
        //$article->tags()->attach($request->input('tags_list'));
        
        $this->createArticle($request);
        

        flash()->overlay('You article has bennd creted!','Good Job');

        return redirect('articles');

    }

    public function edit(Article $article) {
    	//$article = Article::findOrFail($id);
        $tags = \App\Tag::lists('name','id')->all();
    	return view('articles.edit', compact('article','tags'));
    }

    public function update(Article $article,Requests\CreateArticleRequest $request) {
    	//$article = Article::findOrFail($id);
    	$article->update($request->all());
        $this->syncTags($article, $request->input('tags_list'));
    	return redirect('articles');
    }

    /**
     * Синхронизация списка тегов в БД
     * @param  [type] $article [description]
     * @param  array  $tags    [description]
     * @return [type]          [description]
     */
    private function syncTags($article, array $tags) {
        $article->tags()->sync($tags);
    }

    /**
     * Сохранение нового acticle
     * @param  Requests\CreateArticleRequest $request [description]
     * @return [type]                                 [description]
     */
    public function createArticle(Requests\CreateArticleRequest $request) {
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tags_list'));
        return $article;
    }
}

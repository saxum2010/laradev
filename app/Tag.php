<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable  = [
		'name'
	];
	/**
	 * Ассоциирование acriclle с тегами
	 * 
	 * @return [type] [description]
	 */
    public function articles() {
    	return $this->belongsToMany('App\Article');
    	//return $this->belongsToMany('App\Article', 'article_tag', 'tag_id', 'article_id');
    	//return $this->hasManyThrough('App\Articles', 'App\Tag');
    }
}

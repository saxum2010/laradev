<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
	protected $fillable = array('title', 'body', 'published_at', 'user_id');
	protected $dates = ["published_at"];

	//setNameAttribute
	public function setPublishedAtAttribute($date) {
		//$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	public function getPublishedAtAttribute($date) {
		return new Carbon($date);
	}

	//scopeName
	public function scopePublished($query) {
		$query->where('published_at','<=',Carbon::now());
	}

	public function scopeUnPublished($query) {
		$query->where('published_at','>',Carbon::now());
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function tags(){
    	return $this->belongsToMany('App\Tag', 'article_tag')->withTimestamps(); 
	}

	public function getTagsListAttribute() {
        return $this->tags->lists('id')->all();
    }
}

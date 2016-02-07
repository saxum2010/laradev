<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    
    public function about() {
    	$people = ['Sergey','Max','Anna'];
		return view('pages.about', compact('people'));

    	//return 'About Page';
    	
    	/*$name = 'Iron';
    	$fname = 'man';

		return view('pages.about', compact('name','fname'));*/

    	/*$datas = [
    		'name'=>'Super',
    		'fname'=>'man',
    	];

		return view('pages.about', $datas);*/

    	/*return view('pages.about')->with([
    		'name'=>'Sergey',
    		'fname'=>'Saxum',
    		]);*/

    	/*$name = ' <span class="red" style="color:red">Sergey</span>';
    	return view('pages.about')->with('name', $name);*/
    	//return view('pages.about');
    }

    public function contact() {
    	return view('pages.contact');
    }
}

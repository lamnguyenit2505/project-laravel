<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Comments;


class FrontendController extends Controller
{
    
    public function index()
    {
    	$data['featured'] = Products::where('pro_featured',1)->orderBy('pro_id','desc')->take(8)->get(); 
    	$data['news'] = Products::orderBy('pro_id','desc')->take(8)->get();
    	return view('frontend.home',$data);
    }

    public function details($id)
    {
    	$data['item'] = Products::find($id);
    	$data['comments'] = Comments::where('com_product',$id)->paginate(3);
    	return view('frontend.details',$data);
    }

    public function getCate($id)
    {
    	$data['catName'] = Category::find($id);
    	$data['items'] = Products::where('pro_cate',$id)->orderBy('pro_id', 'desc')->paginate(2);
    	return view('frontend.category',$data);
    }

    public function postComment(Request $request , $id)
    {
    	
    	$comment = new Comments;
    	$comment->com_email = $request->email;
    	$comment->com_content = $request->content;
    	$comment->com_product = $id;
    	$comment->save();
    	return back();   
     }


     public function getSearch(Request $request)
     {
     	$keyword = $request->input('keyword');
     	$data['keyword'] = $keyword;
     	$keyword = str_replace(" ", "%", $keyword);
     	$data['searchResult'] = Products::where('pro_name','like','%' . $keyword . '%')->paginate(2);

     	return view('frontend.search',$data);
     }
}

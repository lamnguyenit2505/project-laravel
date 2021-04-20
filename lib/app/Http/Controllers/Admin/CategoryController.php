<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{
    
    public function getCate()
    {
    	$data['catelists'] = Category::All();
    	return view('backend.category',$data);
    }

    public function addCate(AddCategoryRequest $request){

    	$newCate = new Category;
    	$newCate->cate_name = $request->name;
    	$newCate->cate_slug = str_slug($request->name);
    	$newCate->save();
    	return back();

    }

    public function getEditCate($id)
    {	
    	
    	$data['cate'] = Category::find($id);  
    	return view('backend.editcategory',$data);
    }

    public function storeCate(EditCateRequest $request,$id)
    {
		$newCate = Category::find($id);
    	$newCate->cate_name = $request->name;
    	$newCate->cate_slug = str_slug($request->name);
    	$newCate->save();
    	return redirect()->intended('admin/category');

    }

    public function getDeleteCate($id)
    {

    	Category::destroy($id);
    	return back();

    }
}

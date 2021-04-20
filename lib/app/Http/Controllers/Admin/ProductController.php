<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Products;
use App\Models\Category;
use DB;


class ProductController extends Controller
{
    public function index()
    {
    	
    	$data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.pro_cate','vp_categories.cate_id')->orderBy('pro_id')->get();
    	return view('backend.product',$data);
    	return back();
    }

    public function getAddPro()
    {

    	$data['catelist'] = Category::All();
    	return view('backend.addproduct',$data);

    } 

    public function addPro(AddProductRequest $request )
    {

    	$filename = $request->img->getClientOriginalName();
    	$product = new Products;
    	$product->pro_name = $request->name;
    	$product->pro_price = $request->price;
    	$product->pro_img= $filename;
    	$product->pro_slug = str_slug($request->name);
    	$product->pro_accessories = $request->accessories;
    	$product->pro_condition = $request->condition;
    	$product->pro_promotion = $request->promotion;
    	$product->pro_warranty = $request->warranty;
    	$product->pro_status = $request->status;
    	$product->pro_descri = $request->description;
    	$product->pro_featured = $request->featured;
    	$product->pro_cate = $request->cate;
    	$product->save();

    	$request->img->storeAs('Avatar',$filename);
    	return redirect()->intended('admin/product')->withInput()->with('message','Đã sửa thành công sản phẩm');



    }

    public function getEditPro($id)
    {

    	$data['product'] = Products::find($id);
    	$data['listcate'] = Category::all();
    	return view('backend.editproduct',$data);
    } 

    public function updatePro(Request $request , $id)
    {
    	
    	$product = new Products;
    	$arr['pro_name'] = $request->name;
    	$arr['pro_slug'] = str_slug($request->name);
    	$ar['pro_price'] = $request->price;
    	$arr['pro_accessories'] = $request->accessories;
    	$arr['pro_condition'] =  $request->condition;
    	$arr['pro_promotion'] =  $request->promotion;
    	$arr['pro_warranty'] =  $request->warranty;
    	$arr['pro_status'] =  $request->status;
    	$arr['pro_descri'] =  $request->description;
    	$arr['pro_featured'] =  $request->featured;
    	$arr['pro_cate'] = $request->cate;

   		if ($request->hasFile('img')) {

   			$img = $request->img->getClientOriginalName();
   			$arr['pro_img'] = $img;
   			$request->img->storeAs('Avatar',$img);
   			
   		}
    	$product::where('pro_id',$id)->update($arr);
    	return redirect()->intended('admin/product');
    }

    public function deletePro($id)
    {
    	Products::destroy($id);
    	return back();
    	
    }
}

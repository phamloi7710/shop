<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products\Category;
use App\Model\Products\Product;
class ProductController extends Controller
{
	// Products
    public function getListProducts()
    {
        $products = Product::all();
    	return view('admin.pages.products.products',['products'=>$products]);
    }
    public function postAddProduct(Request $request)
    {
    	$product = new Product();
        $product->name = $request->txtName;
        $product->url = changeTitle($request->txtName);
        $product->avatar = $request->avatar;
        $imageData = array();
        $productImageData = $request->imageData;
        if(is_array($productImageData)) {
            for($i=0; $i < count($productImageData); $i++) {
                $imageData[$i] = [
                    'image' => $productImageData[$i],
                ];
            }
        }
        $product->imageData = serialize($imageData);
        $product->code = $request->txtCode;
        $product->summary = $request->summary;
        $product->content = $request->content;
        $product->titleSeo = $request->txtTitleSeo;
        $product->descriptionSeo = $request->txtDescriptionSeo;
        $product->tags = $request->txtTags;
        $product->price = $request->txtPrice;
        $product->qty = $request->txtQty;
        $sizeData = [
            'length' => $request->txtLength,
            'width' => $request->txtWidth,
            'height' => $request->txtHeight,
        ];
        $product->sizeData = serialize($sizeData);
        $product->sort = $request->txtSort;
        $product->save();
        $notification = array(
                'message' => __("notify.addNewSuccessfully",['attribute'=>__("general.product")]), 
                'alert-type' => 'success',
            );
        return redirect()->back()->with($notification);
        
    }
    public function postEditProduct(Request $request, $id)
    {
    	//
    }
    public function deleteProduct($id)
    {
    	//
    }
    // Categories
    public function getListCategories()
    {
    	return view('admin.pages.products.categories');
    }
    public function postAddCategory(Request $request)
    {
    	//
    }
    public function postEditCategory(Request $request, $id)
    {
    	//
    }
    public function deleteCategory($id)
    {
    	//
    }
    // Peoducers
    public function getListProducers()
    {
    	return view('admin.pages.products.producers');
    }
    public function postAddProducer(Request $request)
    {
    	//
    }
    public function postEditProducer(Request $request, $id)
    {
    	//
    }
    public function deleteProducer($id)
    {
    	//
    }
}

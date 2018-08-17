<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products\Category;
use App\Model\Products\Product;
use App;
class ProductController extends Controller
{
	// Products
    public function getListProducts()
    {
        $products = Product::all();
    	return view('admin.pages.products.products',['products'=>$products]);
    }
    public function getAddProduct()
    {
        return view('admin.pages.products.addProduct');
    }
    public function postAddProduct(Request $request)
    {
    	$product = new Product();
        $product->name = $request->txtName;
        $product->url = changeTitle($request->txtName);
        $product->avatar = $request->avatar;
        $product->langCode = App::getLocale();
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
        $product->priceWareHouse = formatPriceVN($request->txtPriceWareHouse);
        $product->priceSell = formatPriceVN($request->txtPriceSell);
        $product->priceSale = formatPriceVN($request->txtPriceSale);
        $product->qty = $request->txtQty;
        $sizeData = [
            'length' => $request->txtLength,
            'width' => $request->txtWidth,
            'height' => $request->txtHeight,
            'type' => $request->sltSizeType,
        ];
        $product->sizeData = serialize($sizeData);
        $weightData = [
            'weight' => $request->txtWeight,
            'type' => $request->sltWeightType,
        ];
        $product->weightData = serialize($weightData);
        $product->sort = $request->txtSort;
        $product->save();
        if($request->attribute)
        {
            $productAttribute = new Product();
            $productAttribute->attribute_id = $product->id;
            $productAttribute->save();
        }
        $notification = array(
            'message' => __("notify.addNewSuccessfully",['attribute'=>__("general.product")]), 
            'alert-type' => 'success',
        );
        return redirect()->route('getListProductsAdmin')->with($notification);
        
        
    }
    public function getEditProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $imageData = unserialize($product->imageData);
        $sizeData = unserialize($product->sizeData);
        $weightData = unserialize($product->weightData);
        return view('admin.pages.products.editproduct',['product'=>$product, 'imageData'=>$imageData, 'sizeData'=>$sizeData,'weightData'=>$weightData]);
    }
    public function postEditProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->txtName;
        $product->url = changeTitle($request->txtName);
        $product->avatar = $request->avatar;
        $product->langCode = App::getLocale();
        $data = array();
        $productImageData = $request->imageData;
        if(is_array($productImageData)) {
            for($i=0; $i < count($productImageData); $i++) {
                $data[$i] = [
                    'image' => $productImageData[$i],
                ];
            }
        }
        
        $product->imageData = serialize($data);
        $product->code = $request->txtCode;
        $product->summary = $request->summary;
        $product->content = $request->content;
        $product->titleSeo = $request->txtTitleSeo;
        $product->descriptionSeo = $request->txtDescriptionSeo;
        $product->tags = $request->txtTags;
        $product->priceWareHouse = formatPriceVN($request->txtPriceWareHouse);
        $product->priceSell = formatPriceVN($request->txtPriceSell);
        $product->priceSale = formatPriceVN($request->txtPriceSale);
        $product->qty = $request->txtQty;
        $sizeData = [
            'length' => $request->txtLength,
            'width' => $request->txtWidth,
            'height' => $request->txtHeight,
            'type' => $request->sltSizeType,
        ];
        $product->sizeData = serialize($sizeData);
        $weightData = [
            'weight' => $request->txtWeight,
            'type' => $request->sltWeightType,
        ];
        $product->weightData = serialize($weightData);
        $product->sort = $request->txtSort;
        $product->save();
        $notification = array(
            'message' => __("notify.updateSuccessfully",['attribute'=>__("general.product")]), 
            'alert-type' => 'success',
        );
        return redirect()->route('getListProductsAdmin')->with($notification);
        
        
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

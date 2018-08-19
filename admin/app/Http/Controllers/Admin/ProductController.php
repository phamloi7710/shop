<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products\Category;
use App\Model\Products\Product;
use App;
class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-add', ['only' => ['postAddUser']]);
    }
	// Products
    public function getListProducts()
    {
        $products = Product::all();
        
    	return view('admin.pages.products.products',['products'=>$products]);
    }
    public function getAddProduct()
    {
        $categories = Category::all();
        return view('admin.pages.products.addProduct',['categories'=>$categories]);
    }
    public function postAddProduct(Request $request)
    {
    	$product = new Product();
        $product->name = $request->txtName;
        $product->url = changeTitle($request->txtName);
        $product->category_id = $request->sltparentCategory;
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
        if($request->txtPriceWareHouse){
            $product->priceWareHouse = formatPriceVN($request->txtPriceWareHouse);
        }else{
            $product->priceWareHouse = formatPriceVN(0);
        }
        if($request->txtPriceWareHouse){
            $product->priceSell = formatPriceVN($request->txtPriceSell);
        }else{
            $product->priceSell = formatPriceVN(0);
        }
        if($request->txtPriceWareHouse){
            $product->priceSale = formatPriceVN($request->txtPriceSale);
        }else{
            $product->priceSale = formatPriceVN(0);
        }
        
        
        
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
        $attributeName = $request->txtAttributeName;
        $attributePriceWareHouse = $request->txtAttributePriceWareHouse;
        $attributePriceSell = $request->txtAttributePriceSell;
        $attributePriceSale = $request->txtAttributePriceSale;
        $attributeQty = $request->txtAttributeQty;
        $attributeData = array();
        if(is_array($attributeName)) {
            for($i=0; $i < count($attributeName); $i++) {
                $attributeData[$i] = [
                    'AttributeName' => $attributeName[$i],
                    'AttributePriceWareHouse' => $attributePriceWareHouse[$i],
                    'AttributePriceSell' => $attributePriceSell[$i],
                    'AttributePriceSale' => $attributePriceSale[$i],
                    'AttributeQty' => $attributeQty[$i],
                ];
            }
        }
        $product->attributeData = serialize($attributeData);
        $product->save();

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
        $attributeData = unserialize($product->attributeData);
        $categories = Category::all();
        return view('admin.pages.products.editproduct',['product'=>$product, 'imageData'=>$imageData, 'sizeData'=>$sizeData,'weightData'=>$weightData, 'attributeData'=>$attributeData, 'categories'=>$categories]);
    }
    public function postEditProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->txtName;
        $product->url = changeTitle($request->txtName);
        $product->category_id = $request->sltparentCategory;
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
        if($request->txtPriceWareHouse){
            $product->priceWareHouse = formatPriceVN($request->txtPriceWareHouse);
        }else{
            $product->priceWareHouse = formatPriceVN(0);
        }
        if($request->txtPriceWareHouse){
            $product->priceSell = formatPriceVN($request->txtPriceSell);
        }else{
            $product->priceSell = formatPriceVN(0);
        }
        if($request->txtPriceWareHouse){
            $product->priceSale = formatPriceVN($request->txtPriceSale);
        }else{
            $product->priceSale = formatPriceVN(0);
        }
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
        $attributeName = $request->txtAttributeName;
        $attributePriceWareHouse = $request->txtAttributePriceWareHouse;
        $attributePriceSell = $request->txtAttributePriceSell;
        $attributePriceSale = $request->txtAttributePriceSale;
        $attributeQty = $request->txtAttributeQty;
        $attributeData = array();
        if(is_array($attributeName)) {
            for($i=0; $i < count($attributeName); $i++) {
                $attributeData[$i] = [
                    'AttributeName' => $attributeName[$i],
                    'AttributePriceWareHouse' => $attributePriceWareHouse[$i],
                    'AttributePriceSell' => $attributePriceSell[$i],
                    'AttributePriceSale' => $attributePriceSale[$i],
                    'AttributeQty' => $attributeQty[$i],
                ];
            }
        }
        $product->attributeData = serialize($attributeData);
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
        $category = Category::all()->toArray();
    	return view('admin.pages.products.categories',['category'=>$category]);
    }
    public function postAddCategory(Request $request)
    {
    	$category = new Category;
        $category->name = $request->txtName;
        $category->slug = changeTitle($request->txtName);
        $category->parent_id = $request->sltparentCategory;
        $category->sort = $request->txtSort;
        $category->status = $request->status;
        $category->note = $request->note;
        $category->save();
        $notification = array(
            'message' => __("notify.addNewSuccessfully",['attribute'=>__("general.category")]), 
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function getEditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.pages.products.editCategory',['category'=>$category]);
    }
    public function postEditCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->txtName;
        $category->slug = changeTitle($request->txtName);
        $category->parent_id = $request->sltparentCategory;
        $category->sort = $request->txtSort;
        $category->status = $request->status;
        $category->note = $request->note;
        $category->save();
        $notification = array(
            'message' => __("notify.updateSuccessfully",['attribute'=>__("general.category")]), 
            'alert-type' => 'success',
        );
        return redirect()->route('getListCategoriesAdmin')->with($notification);
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

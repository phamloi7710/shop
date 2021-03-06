<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products\Category;
use App\Model\Products\Product;
use App;
use App\Exports\ProductExport;
use Excel;
class ProductController extends Controller
{
    function __construct()
    {
         // $this->middleware('permission:product-get-list', ['only' => ['getListProducts']]);
         // $this->middleware('permission:product-get-add', ['only' => ['getAddProduct']]);
         // $this->middleware('permission:product-post-add', ['only' => ['postAddProduct']]);
         // $this->middleware('permission:product-get-edit', ['only' => ['getEditProduct']]);
         // $this->middleware('permission:product-post-edit', ['only' => ['postEditProduct']]);
         // $this->middleware('permission:product-get-delete', ['only' => ['deleteProduct']]);
    }
    
    public function getListProducts()
    {
        $products = Product::where('langCode', App::getLocale())->get();
        
    	return view('admin.pages.products.products',['products'=>$products]);
    }
    public function getAddProduct()
    {
        $categories = Category::where('langCode', App::getLocale())->get();
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
        $product->priceWareHouse = $request->txtPriceWareHouse;
        $product->priceSell = $request->txtPriceSell;
        $product->priceSale = $request->txtPriceSale;
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
        $attributePriceWareHouse = $request->txtAttributePriceWareHouse;
        $attributePriceSell = $request->txtAttributePriceSell;
        $attributePriceSale = $request->txtAttributePriceSale;
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
    public function exportProduct($type) 
    {
        $products = Product::select('name','code','priceWareHouse','priceSell','priceSale','qty','summary','note','created_at')->get();
        return Excel::create('products', function($excel) use ($products) {
            $excel->sheet('Tất Cả Sản Phẩm', function($sheet) use ($products)
            {
                $result = $this->getProductsToExcel($products);
                $sheet->fromArray($result);
            });
        })->download($type);
    }
    private function getProductsToExcel($products)
    {
        $result = [];
     
        foreach ($products as $key => $value) {
            $result[] = [
                'STT' => $key + 1,
                'Tên Sản Phẩm' => isset($value->name) ? $value->name : 'Đang Cập Nhật',
                'Mã SP' => isset($value->code) ? $value->code : 'Đang Cập Nhật',
                'Giá Nhập' => isset($value->priceWareHouse) ?  number_format($value->priceWareHouse) : 'Đang Cập Nhật',
                'Giá Bán' => isset($value->priceSell) ? number_format($value->priceSell) : 'Đang Cập Nhật',
                'Giá Khuyến Mãi' => isset($value->priceSale) ? number_format($value->priceSale) : 'Đang Cập Nhật',
                'Số Lượng' => isset($value->qty) ? $value->qty : '',
                'Ngày Tạo' => isset($value->created_at) ? date('d/m/Y',strtotime($value->created_at)) : 'Đang Cập Nhật',
                'Tổng' => (isset($value->qty) && isset($value->priceWareHouse)) ? number_format($value->qty * $value->priceWareHouse) : 0
            ];
        }
        return $result;
    }
    public function deleteProduct($id)
    {
    	$product = Product::find($id);
        $product->delete();
        $notification = array(
            'message' => __("notify.deleteSuccessfully",['attribute'=>__("general.product")]), 
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Categories
    public function getListCategories()
    {
        $category = Category::where('langCode', App::getLocale())->get();
        // $category = $category->paginate(5);
    	return view('admin.pages.products.categories',['category'=>$category]);
    }
    public function postAddCategory(Request $request)
    {
    	$category = new Category;
        $category->name = $request->txtCategoryName;
        $category->slug = changeTitle($request->txtCategoryName);
        $category->langCode = App::getLocale();
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
        $category->name = $request->txtCategoryName;
        $category->slug = changeTitle($request->txtCategoryName);
        $category->langCode = App::getLocale();
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
        $parent = Category::where('parent_id',$id)->count();
        $product = Product::where('category_id',$id)->count();
        if ($parent == 0 && $product == 0) 
        {
            $category = Category::find($id);
            $category->delete();
            $notification = array(
                'message' => __("notify.deleteSuccessfully",['attribute'=>__("general.category")]), 
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
        else
        {
            if ($parent == 0) {
                $notification = array(
                    'message' => __("notify.deleteCategoryError1"), 
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }
            if ($product == 0) {
                $notification = array(
                    'message' => __("notify.deleteCategoryError2"), 
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }
        }
        
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

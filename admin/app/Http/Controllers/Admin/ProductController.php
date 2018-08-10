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
    	return view('admin.pages.products.products');
    }
    public function postAddProduct(Request $request)
    {
    	//
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

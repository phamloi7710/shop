<?php
Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');
Route::post('language',array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@index',
));
Route::get('language/{locale}',array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@locale',
))->name('setLanguage');
Route::get('login.html', 'Admin\AuthController@getLogin')->name('getLoginAdmin');
Route::post('login.html', 'Admin\AuthController@postLogin')->name('postLoginAdmin');
Route::get('logout.html', 'Admin\AuthController@getLogout')->name('getLogoutAdmin');
// Route::group(['middleware' => ['role:super-admin']], function(){
Route::group(['middleware' => 'checkRoleAdmin'], function(){

	Route::get('', 'Admin\AdminController@getIndex')->name('getIndexAdmin');
	Route::get('uploads', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
    Route::post('uploads/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');
	Route::group(['prefix'=>'management'], function(){
		Route::group(['prefix'=>'permissions'], function(){
			Route::get('', 'Admin\PermisssionController@getList')->name('getListPermisssions');
			Route::post('add', 'Admin\PermisssionController@postAdd')->name('postAddPermisssion');
			Route::post('edit/{id}', 'Admin\PermisssionController@postEdit')->name('postEditPermisssion');
			Route::get('delete/{id}', 'Admin\PermisssionController@delete')->name('deletePermisssion');
		});
		Route::group(['prefix'=>'languages'], function(){
			Route::get('', 'Admin\LanguageController@getList')->name('getListLanguages');
			Route::post('add', 'Admin\LanguageController@postAdd')->name('postAddLanguage');
			Route::post('edit/{id}', 'Admin\LanguageController@postEdit')->name('postEditLanguage');
			Route::get('delete/{id}', 'Admin\LanguageController@delete')->name('deleteLanguage');
		});
		Route::group(['prefix'=>'categories'], function(){
			Route::get('', 'Admin\ProductController@getListCategories')->name('getListCategoriesAdmin');
			Route::post('add-category', 'Admin\ProductController@postAddCategory')->name('postAddCategoryAdmin');
			Route::get('edit/{id}', 'Admin\ProductController@getEditCategory')->name('getEditCategoryAdmin');
			Route::post('edit/{id}', 'Admin\ProductController@postEditCategory')->name('postEditCategoryAdmin');
			Route::get('delete/{id}', 'Admin\ProductController@deleteCategory')->name('deleteCategoryAdmin');
		});
		Route::group(['prefix'=>'products'], function(){
			Route::get('', 'Admin\ProductController@getListProducts')->name('getListProductsAdmin');
			Route::get('add-product', 'Admin\ProductController@getAddProduct')->name('getAddProductAdmin');
			Route::post('add-product', 'Admin\ProductController@postAddProduct')->name('postAddProductAdmin');
			Route::get('edit-product/{id}', 'Admin\ProductController@getEditProduct')->name('getEditProductAdmin');
			Route::post('edit-product/{id}', 'Admin\ProductController@postEditProduct')->name('postEditProductAdmin');
			Route::get('delete-product/{id}', 'Admin\ProductController@deleteProduct')->name('deleteProductAdmin');
			Route::get('exportExcelProduct/{type}', 'Admin\ProductController@exportProduct')->name('exportExcelProduct');
		});
		Route::group(['prefix'=>'producers'], function(){
			Route::get('', 'Admin\LanguageController@getListProducers')->name('getListProducersAdmin');
			Route::post('add-Producer', 'Admin\LanguageController@postAddProducer')->name('postAddProducerAdmin');
			Route::post('edit-Producer/{id}', 'Admin\LanguageController@postEditProducer')->name('postEditProducerAdmin');
			Route::get('delete-Producer/{id}', 'Admin\LanguageController@deleteProducer')->name('deleteProducerAdmin');
		});
	});
	Route::group(['prefix'=>'users'], function(){
		Route::get('group-user', 'Admin\AccountController@getListUserGroup')->name('getListUserGroup');
		Route::post('add-group-user', 'Admin\AccountController@postAddUserGroup')->name('postAddUserGroup');
		Route::post('edit-group-user/{id}', 'Admin\AccountController@postEditUserGroup')->name('postEditUserGroup');
		Route::get('delete-group-user/{id}', 'Admin\AccountController@deleteUserGroup')->name('deleteUserGroup');
		Route::get('', 'Admin\AccountController@getListUsers')->name('getListUsers');
		Route::post('add', 'Admin\AccountController@postAddUser')->name('postAddUser');
		Route::get('edit/{id}', 'Admin\AccountController@getEditUser')->name('getEditUser');
		Route::post('edit/{id}', 'Admin\AccountController@postEditUser')->name('postEditUser');
		Route::get('delete/{id}', 'Admin\AccountController@deleteUser')->name('deleteUser');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

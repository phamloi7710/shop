<?php
Route::post('language',array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@index',
));
Route::get('language/{locale}',array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@locale',
))->name('setLanguage');
Route::get('login.html', 'Admin\AccountController@getLogin')->name('getLoginAdmin');
Route::post('login.html', 'Admin\AccountController@postLogin')->name('postLoginAdmin');
Route::get('logout.html', 'Admin\AccountController@getLogout')->name('getLogoutAdmin');
Route::group(['middleware'=>'checkRoleAdmin'], function(){
	Route::get('', 'Admin\AdminController@getIndex')->name('getIndexAdmin');
	Route::get('uploads', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
    Route::post('uploads/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');
	Route::group(['prefix'=>'management'], function(){
		Route::group(['prefix'=>'languages'], function(){
			Route::get('', 'Admin\LanguageController@getList')->name('getListLanguages');
			Route::post('add-group-user', 'Admin\LanguageController@postAdd')->name('postAddLanguage');
			Route::post('edit-group-user/{id}', 'Admin\LanguageController@postEdit')->name('postEditLanguage');
			Route::get('delete-group-user/{id}', 'Admin\LanguageController@delete')->name('deleteLanguage');
		});
		Route::group(['prefix'=>'categories'], function(){
			Route::get('', 'Admin\ProductController@getListCategories')->name('getListCategoriesAdmin');
			Route::post('add-category', 'Admin\ProductController@postAddCategory')->name('postAddCategoryAdmin');
			Route::post('edit-category/{id}', 'Admin\ProductController@postEditCategory')->name('postEditCategoryAdmin');
			Route::get('delete-category/{id}', 'Admin\ProductController@deleteCategory')->name('deleteCategoryAdmin');
		});
		Route::group(['prefix'=>'products'], function(){
			Route::get('', 'Admin\ProductController@getListProducts')->name('getListProductsAdmin');
			Route::post('add-group-user', 'Admin\ProductController@postAddProduct')->name('postAddProductAdmin');
			Route::post('edit-group-user/{id}', 'Admin\ProductController@postEditProduct')->name('postEditProductAdmin');
			Route::get('delete-group-user/{id}', 'Admin\ProductController@deleteProduct')->name('deleteProductAdmin');
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
		Route::post('add-new', 'Admin\AccountController@postAddUser')->name('postAddUser');
		Route::post('edit/{id}', 'Admin\AccountController@postEditUser')->name('postEditUser');
		Route::get('delete/{id}', 'Admin\AccountController@deleteUser')->name('deleteUser');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php
Route::post('language',array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@index',
));
Route::get('language/{locale}',array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@locale',
))->name('setLanguage');
Route::get('admin/login', 'Admin\AccountController@getLogin')->name('getLoginAdmin');
Route::post('admin/login', 'Admin\AccountController@postLogin')->name('postLoginAdmin');
Route::get('admin/logout', 'Admin\AccountController@getLogout')->name('getLogoutAdmin');
Route::group(['prefix'=>'admin', 'middleware'=>'checkRoleAdmin'], function(){
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
	});
	Route::group(['prefix'=>'users'], function(){
		Route::get('group-user', 'Admin\AccountController@getListUserGroup')->name('getListUserGroup');
		Route::post('add-group-user', 'Admin\AccountController@postAddUserGroup')->name('postAddUserGroup');
		Route::post('edit-group-user/{id}', 'Admin\AccountController@postEditUserGroup')->name('postEditUserGroup');
		Route::get('delete-group-user/{id}', 'Admin\AccountController@deleteUserGroup')->name('deleteUserGroup');
		Route::get('', 'Admin\AccountController@getListUsers')->name('getListUsers');
		Route::post('add-new', 'Admin\AccountController@postAddUser')->name('postAddUser');
		Route::post('edit/{id}', 'Admin\AccountController@postEditUser')->name('postEditUser');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

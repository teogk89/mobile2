<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','MainController@index');



Route::get('/home', 'HomeController@index');


Route::get('/offlineticket','MainController@offline')->name('offline-ticket');;

Route::get('/intern/logout','HomeController@logout')->name('my-logout');

//Route::get('/offline_ticket','MainController@getOffline_ticket')->name('offline-ticket');

Route::any('/guest/view/ticket/{id?}/{post?}','MainController@viewticket')->name('guest-view-ticket');
Route::get('/guest/print/{id}/{post}','MainController@guestprint')->name('guest-print');

Route::get('/guest/queryprice','MainController@queryprice')->name('guest-query-price');

Route::get('/guest/checkticket','MainController@checkticket')->name('guest-check-ticket');

Route::get('/guest/model/queryprice/{id}','MainController@querypricemodel')->name('guest-query-price-model');

Route::get('/guest/model/price/{id}','MainController@pricemodel')->name('guest-price-model');

Route::post('/updateticket','MainController@postUpdateticket')->name('update-ticket');

Route::get('/api','ApiController@api')->name("common-api");

Route::post('/api','ApiController@api')->name("common-api-post");

Route::get('/captcha','MainController@captcha');

Route::get('login','HomeController@getLogin')->name('login');

Route::post('login','HomeController@postLogin');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/backup/{table}','BackupController@backup');

Route::get('check','MainController@check');
	

Route::get('/queryprice','AdminController@queryprice');


Route::get('/subshop/profile','SubShopController@profile')->name('shop-profile');
Route::post('/subshop/profile/save','SubShopController@profilesave')->name('shop-profile-save');


Route::group(['middleware'=>['admin-tech']],function(){


		Route::post('/admin/ticket/edit/quick','AdminController@ticketeditquick')->name("admin-ticket-edit-quick");
		Route::post('/admin/invoice/edits','AdminController@postInvoiceEdits')->name('admin-invoice-edit');
		Route::post('/admin/invoice/upload','AdminController@postInvoiceUpload')->name('admin-invoice-upload');
		
		Route::post("/admin/notice/save",'AdminController@noticesave')->name("admin-notice-save");

		

		Route::post('/admin/model/del','ApiController@modeldel')->name("admin-model-del");
		Route::post('/admin/saveticket','AdminController@saveticket')->name("admin-ticket-save");

		Route::get("/admin/notice/edit/{id?}",'AdminController@noticeedit')->name("admin-notice-edit");
		

});

Route::get('/search','MainController@search')->name("guest-search");
Route::get('/myforward','MainController@myforward')->name('my-forward');


Route::group(['middleware' => ['tech']],function(){





	Route::get('/tech/ticket/list','TechController@mylist')->name("tech-ticket-list");

	Route::get('/tech/ticket/edit/{id}','TechController@ticketedit')->name("tech-ticket-edit");
//	Route::get('/tech/ticket/save/{id}','TechController@ticketsave')->name("tech-ticket-save");
//	Route::get('/tech/profile','TechController@profile')->name("tech-profile");
//	Route::get('/tech/profile/save','TechController@profilesave')->name('tech-profile-save');

	




});
Route::group(['middleware' => ['admin']], function () {


	Route::post('/admin/model/del','ApiController@modeldel')->name("admin-model-del");

	Route::get('/admin/monitor','AdminController@monitor')->name('admin-monitor');


	//Route::get("/admin/notice/edit/{id?}",'AdminController@noticeedit')->name("admin-notice-edit");

	Route::get('/admin/order','AdminController@order');
	Route::get('/admin/type/{type}/per/{per}','AdminController@index')->name('admin-ticket-by-type');

	Route::get("/admin/ticket/new/{user}",'AdminController@newticket')->name("admin-new-ticket");

	Route::get('/admin/edit-ticket/{id}','AdminController@editticket')->name('admin-edit-ticket');
	Route::post('/admin/table-status-update','AdminController@tableStatusUpdate')->name('admin-table-status-update');

	

	Route::get('/admin/bytype?type={type}&per={per}','AdminController@index')->name('admin-ticket-by-type2');

	
	Route::get('/admin/ticket/status-list','AdminController@ticketstatuslist')->name('admin-ticket-status-list');
	Route::get('/admin/ticket/status-add/{id?}','AdminController@ticketstatusadd')->name('admin-ticket-status-add');
	Route::post('/admin/ticket/status-save','AdminController@ticketstatussave')->name('admin-ticket-status-save');
	//Route::post('/admin/invoice/edits','AdminController@postInvoiceEdits')->name('admin-invoice-edit');

	

	Route::get('/admin/dashboard','AdminController@dashboard')->name('admin-dashboard');
	Route::get('/admin/print/{id}','AdminController@myprint')->name("admin-print");
	Route::get('/admin/addprice','AdminController@addprice')->name('admin-addprice');
	Route::get('/admin/addmodel','AdminController@addmodel')->name('admin-addmodel');
	Route::post('/admin/savemodel','AdminController@savemodel')->name('admin-save-model');

	Route::get('/admin/brand/add','AdminController@brandadd')->name('admin-add-brand');
	Route::post('/admin/brand/save','AdminController@savebrand')->name('admin-save-brand');
	Route::get('/admin/modprice/{id}','AdminController@modprice')->name("admin-mod-price");
	Route::post('/admin/modprice/add/{id}','AdminController@modpriceadd')->name("admin-mod-price-add");
	Route::post('/admin/modprice/edit','AdminController@modpriceedit')->name("admin-mod-price-edit");
	Route::post('/admin/model/edit','AdminController@modeledit')->name("admin-model-edit");
    Route::get('/queryprice','AdminController@queryprice')->name('admin-queryprice');


    Route::get('/admin/model/queryprice/{id}','AdminController@querypricemodel')->name('admin-query-price-model');

    Route::get('/admin/setting','AdminController@settings')->name("admin-setting");

    Route::post('/admin/setting/save','AdminController@settingssave')->name("admin-setting-save");


    Route::get('/admin/notice','AdminController@notice')->name("admin-notice");

    

   

    Route::get("/admin/orders",'AdminController@orders')->name('admin-order');
    Route::get("/admin/order/edit/{id?}",'AdminController@orderedit')->name('admin-order-edit');

    Route::post("/admin/order/save",'AdminController@ordersave')->name('admin-save-order');
    Route::get("/admin/email/create",'AdminController@emailcreate')->name('admin-email-create');
    Route::post("/admin/email/send",'AdminController@emailsend')->name('admin-email-send');
    Route::get("/admin/backup",'AdminController@backup')->name('admin-back-up');
    Route::post("/admin/backup/output",'AdminController@backupoutput')->name('admin-backup-output');

    Route::get('/admin/list/subshop','AdminController@subshoplist')->name("admin-subshop-list");
    Route::get('/admin/list/tech','AdminController@techlist')->name("admin-tech-list");
    Route::get('/admin/profile','AdminController@profile')->name('admin-profile');
    Route::get('/admin/user/profile/{id?}','AdminController@userprofile')->name('admin-user-profile');
    Route::post('/admin/profile/save','AdminController@profilesave')->name('admin-profile-save');
    
    Route::get('/admin/user/new','AdminController@newuser')->name('admin-new-user');

});


Route::group(['middleware' => ['subshop']],function(){

	//Route::post('/subshop/profile/save','SubShopController@profilesave')->name('shop-profile-save');


	//Route::get('/subshop/profile','SubShopController@profile')->name('shop-profile');
	Route::get('/subshop/ticket','SubShopController@index')->name('shop-ticket');
	Route::get('/subshop/newticket','SubShopController@ticket')->name('shop-new-ticket');
	
	Route::post('/subshop/saveticket','SubShopController@postNewTicket')->name('shop-save-ticket');

});







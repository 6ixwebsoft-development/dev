<?php

use Illuminate\Support\Facades\Session;

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
Auth::routes();
/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('profile', function () {
    return view('profile');
}); */

Route::get('register-organization', function () {
    return view('register-organization');
});
Route::post('/register-organization/store', 'OrganizationController@store');
Route::get('subscription', function () {
    return view('subscription');
});
Route::post('/subscription/store', 'SubscriptionController@store');


Route::middleware(['auth', 'CheckLogin', 'Access'])->group(function () {
    Route::resource('admin/roles','Auth\RoleController');
    Route::get('admin/roles/delete/{id}', 'Auth\RoleController@delete');
    Route::resource('admin/users','Auth\UserController');
    Route::get('admin/users/delete/{id}', 'Auth\UserController@delete');
	
	Route::post('admin/searchvikashuser','Auth\UserController@searchvikashuser');
	Route::get('admin/passwordhash','Auth\UserController@passwordhash');
	
	Route::post('admin/user/store','Auth\UserController@store');
	Route::post('admin/user/update/{id}', 'Auth\UserController@update');
	
	Route::post('admin/user/passwordactive', 'Auth\UserController@passwordactive');

    Route::get('/home', 'HomeController@index')->name('admin.index');
    Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function() {
    Route::get('/', 'AdminController@index');
    Route::resource('/', 'AdminController');
		
		
		
        Route::get('/settings', 'SettingsController@index');
        Route::get('/settings/getSettings','SettingsController@getSettings');
        Route::post('/settings/store', 'SettingsController@store');

        Route::group(['namespace' => 'Modules', 'prefix' => 'modules'], function () {
            //Module Routes
            Route::get('module', 'ModuleController@index');
            Route::get('module/create', 'ModuleController@create');
            Route::post('/module/store', 'ModuleController@store');
            Route::get('module/{id}/edit', 'ModuleController@edit');
            Route::post('/module/update/{id}', 'ModuleController@update')->name('admin.modules.module.update');
            Route::get('module/delete/{id}', 'ModuleController@delete');

            //Module Field Routes
            Route::get('field', 'ModuleFieldController@index');
            Route::get('field/create', 'ModuleFieldController@create');
            Route::post('/field/store', 'ModuleFieldController@store');
            Route::get('field/{id}/edit', 'ModuleFieldController@edit');
            Route::post('/field/update/{id}', 'ModuleFieldController@update')->name('admin.modules.field.update');
            Route::get('field/delete/{id}', 'ModuleFieldController@delete');

            //Module Field Routes
            Route::get('fieldvalue', 'ModuleFieldValueController@index');
            Route::get('fieldvalue/create', 'ModuleFieldValueController@create');
            Route::post('/fieldvalue/store', 'ModuleFieldValueController@store');
            Route::get('fieldvalue/{id}/edit', 'ModuleFieldValueController@edit');
            Route::post('/fieldvalue/update/{id}', 'ModuleFieldValueController@update')->name('admin.modules.fieldvalue.update');
            Route::get('fieldvalue/delete/{id}', 'ModuleFieldValueController@delete');

        });

        //Foundation routes
        Route::get('foundation', 'FoundationController@index');
        Route::get('foundation/create/', 'FoundationController@create');
        Route::post('/foundation/store', 'FoundationController@store');
        Route::get('foundation/{id}/edit', 'FoundationController@edit');
        Route::post('/foundation/update/{id}', 'FoundationController@update')->name('admin.foundation.update');
        Route::get('foundation/delete/{id}', 'FoundationController@delete');
		Route::get('foundation/exports', 'FoundationController@exports');
		// Search user data for admin
		Route::post('foundation/searchexportfoundation','FoundationController@search_export_foundation');
		Route::post('/foundation/multidelete', 'FoundationController@multidelete');
		
		// Search user data for admin
		 Route::post('/getuserdata', 'UserseachController@searchuserdata');
		 // Search user List data for admin
		 Route::get('/listalluser', 'UserseachController@listalluser');
		 Route::post('/updateaction', 'UserseachController@updateaction');
		
		//countries block, country, state, city
        Route::group(['namespace' => 'Location', 'prefix' => 'location'], function () {
            //countryblock Routes
            Route::get('countryblock', 'CountryBlockController@index');
            Route::get('countryblock/create', 'CountryBlockController@create');
            Route::post('/countryblock/store', 'CountryBlockController@store');
            Route::get('countryblock/{id}/edit', 'CountryBlockController@edit');
            Route::post('/countryblock/update/{id}', 'CountryBlockController@update')->name('admin.location.countryblock.update');
            Route::get('countryblock/delete/{id}', 'CountryBlockController@delete');

            //country
            Route::get('country', 'CountryController@index');
            Route::get('country/create', 'CountryController@create');
            Route::post('/country/store', 'CountryController@store');
            Route::get('country/{id}/edit', 'CountryController@edit');
            Route::post('/country/update/{id}', 'CountryController@update')->name('admin.location.country.update');
            Route::get('country/delete/{id}', 'CountryController@delete');

            //region
            Route::get('region', 'RegionController@index');
            Route::get('region/create', 'RegionController@create');
            Route::post('/region/store', 'RegionController@store');
            Route::get('region/{id}/edit', 'RegionController@edit');
            Route::post('/region/update/{id}', 'RegionController@update')->name('admin.location.region.update');
            Route::get('region/delete/{id}', 'RegionController@delete');

            //city
            Route::get('city', 'CityController@index');
            Route::get('city/create', 'CityController@create');
            Route::post('/city/store', 'CityController@store');
            Route::get('city/{id}/edit', 'CityController@edit');
            Route::post('/city/update/{id}', 'CityController@update')->name('admin.location.city.update');
            Route::get('city/delete/{id}', 'CityController@delete');

        });
    });
    Route::group(array('namespace' => 'Admin\Language', 'prefix' => 'admin'), function() {
    
        Route::get('language','LanguageController@index');
        Route::get('language/create', 'LanguageController@create');
        Route::post('language/store', 'LanguageController@store');
        Route::get('language/{id}/edit', 'LanguageController@edit');
        Route::patch('language/update/{id}', 'LanguageController@update')->name('admin.language.update');
        Route::get('language/delete/{id}', 'LanguageController@delete');
        Route::get('language/deleted', 'LanguageController@deleted');
        Route::get('language/forcedelete/{id}', 'LanguageController@forcedelete');
        Route::get('language/restore/{id}', 'LanguageController@restore');

    });
    Route::group(array('namespace' => 'Admin\Label', 'prefix' => 'admin'), function() {
        
        Route::get('/{id}/label','LabelController@index');
        Route::get('label/create', 'LabelController@create');
        Route::post('label/store', 'LabelController@store');
        Route::get('label/{id}/edit', 'LabelController@edit');
        Route::patch('label/update/{id}', 'LabelController@update')->name('admin.label.update');
        Route::get('label/delete/{id}', 'LabelController@delete');

    });
    Route::group(array('namespace' => 'Admin\Pages', 'prefix' => 'admin'), function() {
        
        Route::get('pages','PagesController@index');
        Route::get('pages/create', 'PagesController@create');
        Route::post('pages/store', 'PagesController@store');
        Route::get('pages/{id}/edit', 'PagesController@edit');
        Route::patch('pages/update/{id}', 'PagesController@update')->name('admin.pages.update');
        Route::get('pages/delete/{id}', 'PagesController@delete');

    });
    Route::group(array('namespace' => 'Admin\Translation', 'prefix' => 'admin'), function() {
        
        Route::get('translation','TranslationController@index');
        Route::get('translation/create', 'TranslationController@create');
        Route::post('translation/store', 'TranslationController@store');
        Route::get('translation/{id}/edit', 'TranslationController@edit');
        Route::patch('translation/update/{id}', 'TranslationController@update')->name('admin.translation.update');
        Route::get('translation/delete/{id}', 'TranslationController@delete');

    });
    Route::group(array('namespace' => 'Admin\Permission', 'prefix' => 'admin'), function() {
        
        Route::get('permission','PermissionController@index');
        Route::get('permission/create', 'PermissionController@create');
        Route::post('permission/store', 'PermissionController@store');
        Route::get('permission/{id}/edit', 'PermissionController@edit');
        Route::patch('permission/update/{id}', 'PermissionController@update')->name('admin.permission.update');
        Route::get('permission/delete/{id}', 'PermissionController@delete');

    }); 
    Route::group(array('namespace' => 'Admin\subscription', 'prefix' => 'admin'),function() {
        
        Route::get('subscription','SubscriptionController@index');
        Route::get('subscription/create', 'SubscriptionController@create');
        Route::post('subscription/store', 'SubscriptionController@store');
        Route::get('subscription/{id}/edit', 'SubscriptionController@edit');
        Route::post('subscription/update/{id}', 'SubscriptionController@update')->name('admin.subscription.update');
        Route::get('subscription/delete/{id}', 'SubscriptionController@delete');
		Route::get('subscription/userlist', 'SubscriptionController@userlist');
		Route::post('subscription/getsubscriptiontype','SubscriptionController@getsubscriptiontype');
		
		Route::post('subscription/getsubsbystatus','SubscriptionController@getsubsbystatus');
		Route::get('subscription/create/{id}/{type}', 'SubscriptionController@create');
		Route::post('subscription/changestatus', 'SubscriptionController@changestatus');
    });
	
	Route::group(array('namespace' => 'Admin\Payment', 'prefix' => 'admin'),function() {
        
        Route::get('paymentmood','PaymentController@index');
		Route::get('paymentmood/create', 'PaymentController@create');
		Route::post('paymentmood/store', 'PaymentController@store');
		Route::get('paymentmood/{id}/edit', 'PaymentController@edit');
		Route::post('paymentmood/update/{id}', 'PaymentController@update')->name('admin.paymentmood.update');
		Route::get('paymentmood/delete/{id}', 'PaymentController@delete'); 
    });
	
	Route::group(array('namespace' => 'Admin\Office', 'prefix' => 'admin'),function() {
        
        Route::get('Office','OfficeController@index');
		Route::get('Office/create', 'OfficeController@create');
		Route::post('Office/store', 'OfficeController@store');
		Route::get('Office/{id}/edit', 'OfficeController@edit');
		Route::post('Office/update/{id}', 'OfficeController@update')->name('admin.Office.update');
		Route::get('Office/delete/{id}', 'OfficeController@delete');
    });
	
	Route::group(array('namespace' => 'Admin\Sproduct', 'prefix' => 'admin'),function() {
        
        Route::get('products','SproductController@index');
		Route::get('product/create', 'SproductController@create');
		Route::post('product/store', 'SproductController@store');
		Route::get('product/{id}/edit', 'SproductController@edit');
		Route::post('product/update/{id}', 'SproductController@update')->name('admin.product.update');
		Route::get('product/delete/{id}', 'SproductController@delete');
		
		Route::post('product/changestatus', 'SproductController@changestatus');
    });
	
	Route::group(array('namespace' => 'Admin\Hitlist', 'prefix' => 'admin'),function() {
        
        Route::get('hitlist','HitlistController@index');
		Route::get('hitlist/create', 'HitlistController@create');
		Route::post('hitlist/store', 'HitlistController@store');
		Route::get('hitlist/{id}/edit', 'HitlistController@edit');
		Route::post('hitlist/update/{id}', 'HitlistController@update')->name('admin.hitlist.update');
		Route::get('hitlist/delete/{id}', 'HitlistController@delete');
		
		Route::post('hitlist/changestatus', 'HitlistController@changestatus');
    });
	
	Route::group(array('namespace' => 'Admin\Purpose', 'prefix' => 'admin'),function() {
        
        Route::get('purpose','PurposeController@index');
		Route::get('purpose/create', 'PurposeController@create');
		Route::post('purpose/store', 'PurposeController@store');
		Route::get('purpose/{id}/edit', 'PurposeController@edit');
		Route::post('purpose/update/{id}', 'PurposeController@update')->name('admin.purpose.update');
		Route::get('purpose/delete/{id}', 'PurposeController@delete');
    });
	
	//Individual routes
	Route::group(array('namespace' => 'Admin\Individual', 'prefix' => 'admin'),function() {
        Route::get('individual', 'IndividualController@index');
        Route::get('individual/create/', 'IndividualController@create');
        Route::post('/individual/store', 'IndividualController@store');
        Route::get('individual/{id}/edit', 'IndividualController@edit');
        Route::post('/individual/update/{id}', 'IndividualController@update')->name('admin.individual.update');
        Route::get('individual/delete/{id}', 'IndividualController@delete');
		Route::post('individual/getregion','IndividualController@getregion');
		Route::post('individual/getcity','IndividualController@getcity');
		
		Route::post('individual/updateaction','IndividualController@updateaction');
		
	});
	
	Route::group(array('namespace' => 'Admin\Library', 'prefix' => 'admin'),function() {
        
        Route::get('library','LibraryController@index');
		Route::get('library/create', 'LibraryController@create');
		Route::post('library/store', 'LibraryController@store');
		Route::get('library/{id}/edit', 'LibraryController@edit');
		Route::post('library/update/{id}', 'LibraryController@update')->name('admin.library.update');
		Route::get('library/delete/{id}', 'LibraryController@delete');
    });
	
	Route::group(array('namespace' => 'Admin\Library', 'prefix' => 'admin'),function() {
        
        Route::get('librarygroup','LibraryGroupController@index');
		Route::get('librarygroup/create', 'LibraryGroupController@create');
		Route::post('librarygroup/store', 'LibraryGroupController@store');
		Route::get('librarygroup/{id}/edit', 'LibraryGroupController@edit');
		Route::post('librarygroup/update/{id}', 'LibraryGroupController@update')->name('admin.librarygroup.update');
		Route::get('librarygroup/delete/{id}', 'LibraryGroupController@delete');
		
		Route::post('librarygroup/changestatus', 'LibraryGroupController@changestatus');
    });
	
	Route::group(array('namespace' => 'Admin\Organization', 'prefix' => 'admin'),function() {
        
        Route::get('organization','OganizationController@index');
		Route::get('organization/create', 'OganizationController@create');
		Route::post('organization/store', 'OganizationController@store');
		Route::get('organization/{id}/edit', 'OganizationController@edit');
		Route::post('organization/update/{id}', 'OganizationController@update')->name('admin.organization.update');
		Route::get('organization/delete/{id}', 'OganizationController@delete');
		Route::post('organization/document', 'OganizationController@deleteDataImg');
    });
	
	Route::group(array('namespace' => 'Admin\Subscriptiontype', 'prefix' => 'admin'),function() {
        
        Route::get('subscriptiontype','SubscriptiontypeController@index');
		Route::get('subscriptiontype/create', 'SubscriptiontypeController@create');
		Route::post('subscriptiontype/store', 'SubscriptiontypeController@store');
		Route::get('subscriptiontype/{id}/edit', 'SubscriptiontypeController@edit');
		Route::post('subscriptiontype/update/{id}', 'SubscriptiontypeController@update')->name('admin.subscriptiontype.update');
		Route::get('subscriptiontype/delete/{id}', 'SubscriptiontypeController@delete');
		Route::post('subscriptiontype/changestatus', 'SubscriptiontypeController@changestatus');
		
    });
	
	Route::group(array('namespace' => 'Admin\Subject', 'prefix' => 'admin'),function() {
        
        Route::get('subject','SubjectController@index');
		Route::get('subject/create', 'SubjectController@create');
		Route::post('subject/store', 'SubjectController@store');
		Route::get('subject/{id}/edit', 'SubjectController@edit');
		Route::post('subject/update/{id}', 'SubjectController@update')->name('admin.subject.update');
		Route::get('subject/delete/{id}', 'SubjectController@delete');
    });
	
	Route::group(array('namespace' => 'Admin\Transaction', 'prefix' => 'admin'),function() {
        
        Route::get('transaction','TransactionController@index');
		Route::get('transaction/create', 'TransactionController@create');
		Route::post('transaction/store', 'TransactionController@store');
		Route::get('transaction/{id}/edit', 'TransactionController@edit');
		Route::post('transaction/update/{id}', 'TransactionController@update')->name('admin.transaction.update');
		Route::get('transaction/delete/{id}', 'TransactionController@delete');
		
		Route::post('transaction/searchtransactiondata', 'TransactionController@searchtransactiondata');
    });
	
	Route::group(array('namespace' => 'Admin\Order', 'prefix' => 'admin'),function() {
        
        Route::get('order','OrderController@index');
		Route::get('order/create', 'OrderController@create');
		Route::post('order/store', 'OrderController@store');
		Route::get('order/{id}/edit', 'OrderController@edit');
		Route::post('order/update/{id}', 'OrderController@update')->name('admin.order.update');
		Route::get('order/delete/{id}', 'OrderController@delete');
		Route::post('order/getproduct', 'OrderController@getproduct');
		Route::post('order/getorderbystatus', 'OrderController@getorderbystatus');
		
		Route::get('order/create/{id}/{type}', 'OrderController@create');
		Route::post('order/changestatus', 'OrderController@changestatus');
		
    });
	
	Route::group(array('namespace' => 'Admin\Menu', 'prefix' => 'admin'),function() {
        
        Route::get('menu','MenuController@index');
		Route::get('menu/create', 'MenuController@create');
		Route::post('menu/store', 'MenuController@store');
		Route::get('menu/{id}/edit', 'MenuController@edit');
		Route::post('menu/update/{id}', 'MenuController@update')->name('admin.menu.update');
		Route::get('menu/delete/{id}', 'MenuController@delete');
		
		Route::get('menu/getdatamenu', 'MenuController@getdatamenu');
		Route::get('menu/createfooter', 'MenuController@createfooter');
		
    });
	
	Route::group(array('namespace' => 'Admin\Report', 'prefix' => 'admin'),function() {
        
        Route::get('report/cash_flow','ReportController@index');
		
		Route::post('report/searchdatabyfilter', 'ReportController@searchdatabyfilter');	
    });
	
	
});


//search foundation
Route::get('search-foundation','FoundationSearchController@index');
Route::get('autocomplete','FoundationSearchController@autocomplete');
Route::get('advance-search','FoundationSearchController@advanceSearch');
Route::post('getAdvanceFoundations','FoundationSearchController@getAdvanceFoundations');
//Route::post('simple-search-result','FoundationSearchController@simpleSearchResult');
Route::get('simple-search-result','FoundationSearchController@simpleSearchResult');
Route::get('loadMore','FoundationSearchController@loadMore');
Route::get('getFoundationDetails','FoundationSearchController@getFoundationDetails');
Route::get('foundation-detail/{id}','FoundationSearchController@getFoundationDetail');
Route::get('saveSearch','UserSearchSaveController@saveSearch');
Route::get('fund-search-mail','MailController@fundSearchEmail');
Route::post('fund-search-mail-send','MailController@foundationSearchSendMail');
Route::get('getFoundationDetailAjax','FoundationSearchController@getFoundationDetailAjax');

Route::get('profile','HomeController@profile');

Route::get('language/{lan}','PageController@language');

Route::get('contact-us','PageController@contactus');

//Pages dynamic route

Route::get('/','PageController@home');

Route::get('/{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));
Route::get('sendemail', 'SendEmailController@sendmail');


    // Route::get('profile','HomeController@profile');
    
    // Route::get('/{slugs}/{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));



Route::group([
    'prefix' => '{local}', 
    /* 'where' => ['locale' => '[a-zA-Z]{2}'], */ 
    'middleware' => 'setlocale'
    ], function() {

	Route::get('/','PageController@home');
   
	Route::get('profile','HomeController@profile');
	
	Route::get('/{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));
	Route::get('advance-search','FoundationSearchController@advanceSearch');
	
	Route::get('contact-us','PageController@contactus');
	
});

Route::group([
    'middleware' => 'setlocale'
    ], function() {

	Route::get('profile','HomeController@profile');
	
	Route::get('{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));
	
	Route::get('/','PageController@home');
	
	Route::get('search-foundation','FoundationSearchController@index');
	Route::get('simple-search-result','FoundationSearchController@simpleSearchResult');
	Route::get('advance-search','FoundationSearchController@advanceSearch');
	Route::get('foundation-detail/{id}','FoundationSearchController@getFoundationDetail');
	Route::get('contact-us','PageController@contactus');
});


/*
 Route::get('/{request}/{slug}', function () {
    return redirect(app()->getLocale());
});


Route::get('profile', function () {
    return redirect(app()->getLocale());
}); 
*/

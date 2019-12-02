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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('profile', function () {
    return view('profile');
});

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
        Route::patch('subscription/update/{id}', 'SubscriptionController@update')->name('admin.subscription.update');
        Route::get('subscription/delete/{id}', 'SubscriptionController@delete');

    });
});




Route::get('about', function () {
    return view('about');
});
Route::get('insurance', function () {
    return view('insurance');
});
Route::get('resource', function () {
    return view('resource');
});
Route::get('contact-us', function () {
    return view('contact-us');
});
Route::get('access-denied', function () {
    return view('access-denied');
});
//search foundation
Route::get('search-foundation','FoundationSearchController@index');
Route::get('autocomplete','FoundationSearchController@autocomplete');
Route::get('advance-search','FoundationSearchController@advanceSearch');
Route::get('getAdvanceFoundations','FoundationSearchController@getAdvanceFoundations');
//Route::post('simple-search-result','FoundationSearchController@simpleSearchResult');
Route::get('simple-search-result','FoundationSearchController@simpleSearchResult');
Route::get('loadMore','FoundationSearchController@loadMore');
Route::get('getFoundationDetails','FoundationSearchController@getFoundationDetails');
Route::get('foundation-detail/{id}','FoundationSearchController@getFoundationDetail');
Route::get('saveSearch','UserSearchSaveController@saveSearch');
Route::get('fund-search-mail','MailController@fundSearchEmail');
Route::post('fund-search-mail-send','MailController@foundationSearchSendMail');

//Pages dynamic route
Route::get('/{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));

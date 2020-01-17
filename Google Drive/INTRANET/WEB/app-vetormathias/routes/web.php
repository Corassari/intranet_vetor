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
//==========================================================================+
//HOME
//PAGINA INICIAL																	    |
//==========================================================================+
Route::get('/', 'Auth\LoginController@index')->middleware('check.login')
->name('home')
->middleware('check.login');


//==========================================================================+
//AUTH																	    |
//==========================================================================+
Route::prefix('auth')->group(function () {
	
	#------ METHOD GET	
    Route::get('login', function () {
       return view('auth.login');
	})->name('auth.login');		
	Route::get('logout','App\Auth\LoginController@logout')->name('auth.logout')->middleware('check.login');

	#------- METHOD POST	
	Route::post('login', 'App\Auth\LoginController@login');	
});


//==========================================================================+
//ERROR PAGES																|
//==========================================================================+
Route::get('/http-response/{cod?}/','App\HttpResponseController@responseView')->name('http.response');

//==========================================================================+
//ERROR PAGES																|
//==========================================================================+															|
// fin  - financial															|
// sup  - supplies															|
// rh   - human Resources													|
// wf   - workflow															|
// fw   - follow-up															|
// misc - miscellanea 														|		
//==========================================================================+

 Route::group(['prefix' =>'environment','middleware'=>['check.login','check.environment']], function(){
	Route::get('/', function(){
		return view('environment');
	});

	Route::get('sup', 'App\Admin\EnvironmentController@index')->name('env.sup');
	Route::get('fin', 'App\Admin\EnvironmentController@index')->name('env.fin');
	Route::get('rh',  'App\Admin\EnvironmentController@index')->name('env.rh');

	Route::get('follow-up',function(){
		return view('environment',['title'=>'Follow Up']);
	});

	Route::get('workflow',function(){
		return 'Page of Workflow';
	});
 });

//==========================================================================+
//APP FOLLOW-UP																|
//==========================================================================+															|
// fin  - financial															|
// sup  - supplies															|
// rh   - human Resources													|
// wf   - workflow															|
// fw   - follow-up															|
// misc - miscellanea 														|		
//==========================================================================+

 Route::group(['prefix'=>'app/follow-up/','middleware'=>['check.login','check.environment']],function(){
	Route::get('sup/solicit',function(){
		return 'App Follow Up - Suprimentos (Solicitacao de Compras)';
	})->name('fw-sup-solicit');
	Route::get('sup/order',function(){
		return view('app.follow-up.supplies.order');
	})->name('fw-sup-order');


	//-----------------------------------+
	//------------CUSTOM-----------------|
	//-----------------------------------+

	#------ METHOD GET	
	Route::get('sup/order-winery','App\Zanlorenzi\OrderWineryController@index')->name('fw-sup-order-winery');
	
	#------ METHOD POST
	Route::post('sup/order-winery','App\Zanlorenzi\OrderWineryController@store')->name('fw-sup-order-winery-store');
	Route::post('sup/order-winery/{id?}','App\Zanlorenzi\OrderWineryController@setOrderProtheus')->name('fw-sup-order-winery-setorder');
});


//==========================================================================+
//APP MISCELANEA																|
//==========================================================================+															|
// fin  - financial															|
// sup  - supplies															|
// rh   - human Resources													|
// wf   - workflow															|
// fw   - follow-up															|
// misc - miscellanea 														|		
//==========================================================================+

 Route::group(['prefix'=>'app/miscellaneous/','middleware'=>['check.login','check.environment']],function(){
	Route::get('sup/change-provider','App\Miscellaneous\MiscellaneousController@sup_ChangeProvider')->name('misc-sup-change-provider');

});

//==========================================================================+
//ADMIN																		|
//==========================================================================+	
Route::group(['prefix'=>'admin/','middleware'=>['check.login','check.environment']],function(){
	#------ METHOD GET		
	Route::get('/'	,'App\Admin\AdminController@index')->name('admin');
	Route::get('user','App\Admin\UserController@index')->name('admin.user');
	Route::get('user/edit/{id?}','App\Admin\UserController@edit')->name('admin.user.edit');
	Route::get('user/create','App\Admin\UserController@create')->name('admin.user.create');

	#------ METHOD POST
	Route::post('user/index','App\Admin\UserController@list');	
	Route::post('user/store','App\Admin\UserController@store')->name('admin.user.store');	

	#------ METHOD PUT	
	Route::put('user/update/{id?}','App\Admin\UserController@update')->name('admin.user.update');	
	
});
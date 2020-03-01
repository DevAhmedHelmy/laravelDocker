<?php

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
	{
	    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	    Route::prefix('dashboard')->name('dashboard.')->group(function(){
	    Route::get('/','WelcomeController@index')->name('welcome');

Route::resource('/products', 'BasicInformation\ProductController');
		//category routes
		// Route::resource('/categories', 'CategoriesController')->except(['show']);



		
		// Route::resource('clients.orders', 'Client\OrdersController')->except(['show']);

		// Orders Controller
		Route::resource('/orders', 'OrdersController')->except(['show']);
		 

		//user routes
        Route::resource('users', 'User\UserController');
        Route::resource('/companies', 'BasicInformation\CompanyController');
		Route::resource('/departments', 'BasicInformation\DepartmentController');
		Route::resource('/jobs', 'BasicInformation\JobController');
		
        Route::resource('/categories', 'BasicInformation\CategoryController');
         //client routes
		Route::resource('clients', 'Client\ClientController');

        // Supplier routes
        Route::resource('suppliers', 'Supplier\SupplierController');

        // SaleRepresentative routes
        Route::resource('SaleRepresentative', 'SaleRepresentative\SaleRepresentativeController');


	});

});


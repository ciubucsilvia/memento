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

Route::group(
[
	// 'prefix' => LaravelLocalization::setLocale(),
	// 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{

	// ADMIN ROUTES
	Auth::routes();

	Route::prefix('admin')->group(function() {

		Route::get('/', 'Admin\IndexController@index')->name('admin.home');

		Route::resource('sliders', 'Admin\SlidersController');

		Route::match(['articles', 'post'], 'gallery/get-articles', 'Admin\ArticlesController@getArticles');
		Route::resource('articles', 'Admin\ArticlesController');

		Route::match(['get', 'post'], 'portfolios/get-portfolios', 'Admin\PortfoliosController@getPortfolios');
		Route::resource('portfolios', 'Admin\PortfoliosController');

		Route::match(['get', 'post'], 'categories/get-categories', 'Admin\CategoriesController@getCategories');
		Route::resource('categories', 'Admin\CategoriesController');

		Route::match(['get', 'post'], 'gallery/get-gallery', 'Admin\GalleriesController@getGallery');
		Route::resource('gallery', 'Admin\GalleriesController');

		Route::resource('faqs', 'Admin\FaqsController');

		Route::match(['get', 'post'], 'pages/get-pages', 'Admin\PagesController@getPages');
		Route::resource('pages', 'Admin\PagesController');

		Route::resource('menus', 'Admin\MenusController');

		Route::match(['get', 'head'], 'menus-item/{menu}/create', 'Admin\ItemsMenusController@create')->name('createItemMenu');
		Route::resource('menus-item', 'Admin\ItemsMenusController');

		Route::match(['get', 'post'], 'users/get-users', 'Admin\UsersController@getUsers');
		Route::resource('users', 'Admin\UsersController', [
											'except' => 'show'
										]);

		Route::match(['get', 'post'], 'roles/get-roles', 'Admin\RolesController@getRoles');
		Route::resource('roles', 'Admin\RolesController', [
											'except' => 'show'
										]);

		Route::match(['get', 'post'], 'permissions/get-permissions', 'Admin\PermissionsController@getPermissions');
		Route::resource('permissions', 'Admin\PermissionsController');

		Route::resource('testimonials', 'Admin\TestimonialsController');

		Route::resource('icons', 'Admin\IconsController');

		// Order all tables
		Route::match(['get', 'post'], '/order', 'Admin\OrderController@order')->name('orderAll');
	});


// **************************************************************************** //

	
	// SITE ROUTES
	Route::get('/', 'IndexController@index')->name('index');

	Route::get('/portfolios', 'PortfoliosController@index')->name('portfoliosIndex');
	Route::get('/portfolios/categories/{alias?}', 'PortfoliosController@category')->name('portfoliosCategory');
	Route::get('/portfolios/{alias?}', 'PortfoliosController@show')->name('portfolioShow');

	Route::get('/articles', 'ArticlesController@index')->name('articlesIndex');
	Route::get('/articles/categories/{alias?}', 'ArticlesController@category')->name('articlesCategory');
	Route::get('/articles/{alias?}', 'ArticlesController@show')->name('articleShow');
	Route::post('comment', 'CommentController@store')->name('commentsStore');

	Route::get('gallery', 'GalleryController@index')->name('galleryIndex');

	Route::get('contact', 'ContactController@index')->name('contactIndex');
	Route::post('contact', 'ContactController@store')->name('contactStore');

	Route::get('faqs', 'FaqsController@index')->name('faqsIndex');
	Route::get('testimonials', 'TestimonialsController@index')->name('testimonialsIndex');
	
	Route::get('/{page?}', 'PageController@show');
	
});


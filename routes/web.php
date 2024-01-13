<?php

use App\Http\Controllers\Admin\ArticlesController as AdminArticlesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\FaqsController as AdminFaqsController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\IconsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\ItemsMenusController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\PortfoliosController as AdminPortfoliosController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\TestimonialsController as AdminTestimonialsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfoliosController;
use App\Http\Controllers\TestimonialsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ADMIN ROUTES
require __DIR__.'/auth.php';

Route::prefix('admin')->group(function() {

    Route::get('/', [AdminIndexController::class, 'index'])
        ->name('admin.home');

    Route::resource('sliders', SlidersController::class);

    Route::match(['articles', 'post'], 'articles/get-articles', [AdminArticlesController::class, 'getArticles']);
    Route::resource('articles', AdminArticlesController::class);

    Route::match(['get', 'post'], 'portfolios/get-portfolios', [AdminPortfoliosController::class, 'getPortfolios']);
    Route::resource('portfolios', AdminPortfoliosController::class);

    Route::match(['get', 'post'], 'categories/get-categories', [CategoriesController::class, 'getCategories']);
    Route::resource('categories', CategoriesController::class);

    Route::match(['get', 'post'], 'gallery/get-gallery', [GalleriesController::class, 'getGallery']);
    Route::resource('gallery', GalleriesController::class);

    Route::resource('faqs', AdminFaqsController::class);

    Route::match(['get', 'post'], 'pages/get-pages', [PagesController::class, 'getPages']);
    Route::resource('pages', PagesController::class);

    Route::resource('menus', MenusController::class);

    Route::match(['get', 'head'], 'menus-item/{menu}/create', [ItemsMenusController::class, 'create'])
        ->name('createItemMenu');
    Route::resource('menus-item', ItemsMenusController::class)->except(['index', 'show']);

    Route::match(['get', 'post'], 'users/get-users', [UsersController::class, 'getUsers']);
    Route::resource('users', UsersController::class);

    Route::match(['get', 'post'], 'roles/get-roles', [RolesController::class, 'getRoles']);
    Route::resource('roles', RolesController::class);

    Route::match(['get', 'post'], 'permissions/get-permissions', [PermissionsController::class, 'getPermissions']);
    Route::resource('permissions', PermissionsController::class);

    Route::resource('testimonials', AdminTestimonialsController::class);

    Route::resource('icons', IconsController::class);

    // Order all tables
    Route::match(['get', 'post'], '/order', [OrderController::class, 'order'])->name('orderAll');
});


// **************************************************************************** //


// SITE ROUTES
Route::get('/', function() {
    return redirect()->route('index');
});
Route::get('/index', [IndexController::class, 'index'])->name('index');

Route::get('/portfolios', [PortfoliosController::class, 'index'])
    ->name('portfoliosIndex');
Route::get('/portfolios/categories/{alias?}', [PortfoliosController::class, 'category'])
    ->name('portfoliosCategory');
Route::get('/portfolios/{alias?}', [PortfoliosController::class, 'show'])
    ->name('portfolioShow');

Route::get('/articles', [ArticlesController::class, 'index'])
    ->name('articlesIndex');
Route::get('/articles/categories/{alias?}', [ArticlesController::class, 'category'])
    ->name('articlesCategory');
Route::get('/articles/{alias?}', [ArticlesController::class, 'show'])
    ->name('articleShow');
Route::post('comment', [CommentController::class, 'store'])
    ->name('commentsStore');

Route::get('gallery', [GalleryController::class, 'index'])
    ->name('galleryIndex');

Route::get('contact', [ContactController::class, 'index'])
    ->name('contactIndex');
Route::post('contact', [ContactController::class, 'store'])
    ->name('contactStore');

Route::get('faqs', [FaqsController::class, 'index'])
    ->name('faqsIndex');
Route::get('testimonials', [TestimonialsController::class, 'index'])
    ->name('testimonialsIndex');

Route::get('/{page?}', [PageController::class, 'show']);


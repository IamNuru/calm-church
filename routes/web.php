<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;

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

// paystack
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::post('/makedonation/{id}', [PaymentController::class, 'makeDonation'])->name('pay.donation');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about-us', [PagesController::class, 'about'])->name('about-us');
Route::get('/events', [PagesController::class, 'events'])->name('events');
Route::get('/songs', [PagesController::class, 'songs'])->name('pages.songs');
Route::get('/shop', [PagesController::class, 'shop'])->name('shop');
Route::get('/contact-us', [PagesController::class, 'contact'])->name('contact-us');
Route::get('/our-team', [PagesController::class, 'team'])->name('our-team');
Route::get('/donations', [PagesController::class, 'donations'])->name('pages.donations');
Route::get('/sermons', [PagesController::class, 'sermons'])->name('pages.sermons');
Route::get('/sermon-categories', [PagesController::class, 'sermonCategories'])->name('sermon.categories');
Route::get('/member/{id}', [PagesController::class, 'member'])->name('member');
Route::get('/post/{slug}', [PagesController::class, 'post'])->name('single.post');
Route::get('/song/{id}/{slug}', [PagesController::class, 'song'])->name('single.song');
Route::get('/sermon/{slug}',[PagesController::class, 'sermon'])->name('singlesermon');
Route::get('/donation/{slug}',[PagesController::class, 'donation'])->name('single.donation');
Route::get('/checkout',[PagesController::class, 'checkout'])->name('checkout');
Route::get('/product/{slug}',[PagesController::class, 'product'])->name('single.product');
Route::get('/tag/{slug}',[TagController::class, 'index'])->name('pages.tagdetails');
Route::get('/blog',[PagesController::class, 'blog'])->name('blog');

Route::get('/song-category/{slug}',[PagesController::class, 'songCategory'])->name('category.song');
Route::get('/post-category/{slug}',[PagesController::class, 'postCategory'])->name('category.post');
Route::get('/sermon-category/{slug}',[PagesController::class, 'sermonCategory'])->name('category.sermon');

Route::get('shop/filter', [ProductController::class, 'filterProducts'])->name('filterProducts');
Route::get('shop/q', [ProductController::class, 'searchProducts'])->name('searchProducts');


Route::post('book-appointment', [AppointmentController::class, 'store'])->name('bookappointment');


/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */
Route::middleware(['auth:sanctum', 'verified', 'can:is_verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/members', [DashboardController::class, 'members'])->name('members');
        Route::get('/posts', [DashboardController::class, 'posts'])->name('posts');
        Route::get('/sermons', [DashboardController::class, 'sermons'])->name('sermons');
        Route::get('/upload', [DashboardController::class, 'upload'])->name('upload');
        Route::get('/songs', [DashboardController::class, 'songs'])->name('songs');
        Route::get('/parephenials', [DashboardController::class, 'parephenials'])->name('parephenials');
        Route::get('/donations', [DashboardController::class, 'donations'])->name('donations');
        Route::get('/users', [DashboardController::class, 'users'])->name('users');
        Route::middleware('can:is_admin')->group(function () {
            Route::prefix('add')->group(function () {
                Route::get('/new-member', [DashboardController::class, 'addmember'])->name('addnewmember');
                Route::get('/new-post', [DashboardController::class, 'addpost'])->name('addpost');
                Route::get('/new-sermon', [DashboardController::class, 'addsermon'])->name('addsermon');
                Route::get('/donation', [DashboardController::class, 'adddonation'])->name('adddonation');
                Route::get('/song', [DashboardController::class, 'addsong'])->name('addsong');
                Route::get('/parephenial', [DashboardController::class, 'addparephenial'])->name('addparephenial');
            });
            Route::prefix('edit')->group(function () {
                Route::get('/user/{id}', [DashboardController::class, 'edituser'])->name('edituser');
                Route::get('/post/{id}', [DashboardController::class, 'editpost'])->name('editpost');
                Route::get('/sermon/{id}', [DashboardController::class, 'editsermon'])->name('editsermon');
                Route::get('/donation/{id}', [DashboardController::class, 'editdonation'])->name('editdonation');
                Route::get('/song/{id}', [DashboardController::class, 'editsong'])->name('editsong');
                Route::get('/parephenial/{id}', [DashboardController::class, 'editparephenial'])->name('editparephenial');
            });
            Route::prefix('show')->group(function () {
                Route::get('/member', [DashboardController::class, 'updatmemember'])->name('updatmemember');
            });
            Route::prefix('store')->group(function () {
                Route::post('/post', [PostController::class, 'store'])->name('storepost');
                Route::post('/sermon', [SermonController::class, 'store'])->name('storesermon');
                Route::post('/donation', [DonationController::class, 'store'])->name('storedonation');
                Route::post('/user', [UserController::class, 'store'])->name('storeuser');
                Route::post('/song', [SongController::class, 'store'])->name('storesong');
                Route::post('/parephenial', [ProductController::class, 'storeparephenial'])->name('storeparephenial');
          
            });
            Route::prefix('update')->group(function () {
                Route::post('/member', [DashboardController::class, 'updatmemember'])->name('updatmemember');
                Route::post('/donation/{id}', [DonationController::class, 'update'])->name('updatedonation');
                Route::post('/post/{id}', [PostController::class, 'update'])->name('updatepost');
                Route::post('/sermon/{id}', [SermonController::class, 'update'])->name('updatesermon');
                Route::post('/user/{id}', [UserController::class, 'update'])->name('updateuser');
                Route::post('/song/{id}', [SongController::class, 'update'])->name('updatesong');
                Route::post('/parephenial/{id}', [ProductController::class, 'updateparephenial'])->name('updateparephenial');
            });
            Route::prefix('delete')->group(function () {
                Route::delete('/sermon/{id}', [SermonController::class, 'destroy'])->name('deletesermon');
            });
            Route::post('change-user-status/{id}', [UserController::class, 'changeUserStatus'])->name('user.status');
            Route::post('change-post-status/{id}', [PostController::class, 'changePostStatus'])->name('post.status');
        });
    });
});



//emails routes
Route::get('/email', [MailController::class, 'welcomeEmail'])->name('mail.welcome');
Route::get('/unsubscribe/newsletter/{id}/{email}',[MailController::class, 'unsubNewsletter'])->name('newsletter.unsubscribe');
Route::post('/unsub/newsletter/{id}',[MailController::class, 'unsubNews'])->name('unsub.newsletter');
Route::post('/sub/newsletter/{id}',[MailController::class, 'subNews'])->name('sub.newsletter');





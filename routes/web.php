<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\PageBuilderController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Backend\WebsiteSettingController;

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

// ====================== FRONTEND ======================

// homepage
Route::get('/','Frontend\HomeController@index')->name('frontend.home');
Route::get('/blogs','Frontend\HomeController@blogs')->name('frontend.blogs');
Route::get('/blogs/{category}','Frontend\HomeController@blogCategory')->name('frontend.blogs.category');
Route::get('/blog/{slug}','Frontend\HomeController@singleBlog')->name('frontend.blog.show');
Route::get('/pages/{slug}','Frontend\HomeController@singlePage')->name('frontend.page');

//authentication
Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// Route::match(['get', 'post'], 'sign-up', [AuthController::class, 'signup'])->name('signup');
Route::match(['get', 'post'], 'forget-password', [AuthController::class, 'forgetPassword'])->name('forget.password');
Route::match(['get', 'post'], 'new-password', [AuthController::class, 'newPassword'])->name('new.password');
Route::match(['get', 'post'], 'password-reset', [AuthController::class, 'passwordReset'])->name('password.reset');
Route::get('resend-otp', [AuthController::class, 'resendOtp'])->name('resend.otp');


// google auth
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.handle.callback');


// ====================== /FRONTEND =====================

Route::get('dashboard', [AuthController::class, 'userDash'])->name('dashboard.redirect');
Route::get('user/auth-check', [AuthController::class, 'userAuthCheck'])->name('user.auth.check');
Route::post('update-profile', [AuthController::class, 'updateProfile'])->name('user.update.profile')->middleware('auth');

// ====================== BACKEND =======================

// admin
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('backend.admin.dashboard');

    //profile
    Route::get('profile', [DashboardController::class, 'profile'])->name('backend.admin.profile');

    // page builder
    Route::resource('page-builder','Backend\PageController');
    Route::prefix('pages')->group(function () {
        Route::get('/', [PageBuilderController::class, 'index'])->name('backend.admin.pages');
        Route::post('create', [PageBuilderController::class, 'createPage'])->name('backend.admin.page.create');
        Route::get('fetch-data', [PageBuilderController::class, 'fetchPageData'])->name('backend.admin.page.data');
        Route::get('load-create-form', [PageBuilderController::class, 'loadCreateForm'])->name('backend.admin.page.load.create.form');
        Route::get('delete/{id}', [PageBuilderController::class, 'deletePage'])->name('backend.admin.delete.page');
        Route::get('load-edit-form', [PageBuilderController::class, 'loadEditForm'])->name('backend.admin.page.load.edit.form');
        Route::post('edit', [PageBuilderController::class, 'updatePage'])->name('backend.admin.update.page');
        Route::get('delete-page-image/{id}', [PageBuilderController::class, 'deletePageImg'])->name('backend.admin.delete.page.img');
    });

    // user management
    Route::prefix('users')->group(function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('backend.admin.users');
        Route::get('suspend/{id}/{status}', [UserManagementController::class, 'suspend'])->name('backend.admin.user.suspend');
        Route::match(['get', 'post'], 'create', [UserManagementController::class, 'create'])->name('backend.admin.user.create');
        Route::match(['get', 'post'], 'edit/{id}', [UserManagementController::class, 'edit'])->name('backend.admin.user.edit');
        Route::get('delete/{id}', [UserManagementController::class, 'delete'])->name('backend.admin.user.delete');
    });


    // blogs
    Route::prefix('blogs')->group(function () {
        // blog category
        Route::resource('categories','Backend\BlogCategoryController');

        Route::get('/', [BlogController::class, 'index'])->name('backend.admin.blogs');
        Route::get('fetch-data', [BlogController::class, 'fetchBlogData'])->name('backend.admin.blog.data');
        Route::match(['get', 'post'], 'create', [BlogController::class, 'createBlog'])->name('backend.admin.create.blog');
        Route::match(['get', 'post'], 'edit/{id}', [BlogController::class, 'editBlog'])->name('backend.admin.edit.blog');
        Route::get('delete/{id}', [BlogController::class, 'deleteBlog'])->name('backend.admin.delete.blog');
    });

    // settings
    Route::prefix('settings')->group(function () {
        // website settings
        Route::prefix('website')->group(function () {
            Route::controller(WebsiteSettingController::class)->prefix('general')->group(function () {
                Route::get('/', 'websiteGeneral')->name('backend.admin.settings.website.general');
                Route::post('update-info', 'websiteInfoUpdate')->name('backend.admin.settings.website.info.update');
                Route::post('update-contacts', 'websiteContactsUpdate')->name('backend.admin.settings.website.contacts.update');
                Route::post('update-social-links', 'websiteSocialLinkUpdate')->name('backend.admin.settings.website.social.link.update');
                Route::post('update-style-settings', 'websiteStyleSettingsUpdate')->name('backend.admin.settings.website.style.settings.update');
                Route::post('update-custom-css', 'websiteCustomCssUpdate')->name('backend.admin.settings.website.custom.css.update');
                Route::post('update-notification-settings', 'websiteNotificationSettingsUpdate')->name('backend.admin.settings.website.notification.settings.update');
                Route::post('update-website-status', 'websiteStatusUpdate')->name('backend.admin.settings.website.status.update');
            });
            Route::controller(RoleController::class)->prefix('roles')->group(function () {
                Route::get('/', 'index')->name('backend.admin.roles');
                Route::post('create', 'store')->name('backend.admin.roles.create');
                Route::get('show/{id}', 'show')->name('backend.admin.roles.show');
                Route::put('update/{id}', 'update')->name('backend.admin.roles.update');
                Route::get('delete/{id}', 'destroy')->name('backend.admin.roles.delete');
                Route::post('role-permission/{id}', 'updatePermission')->name('backend.admin.update.role-permissions');
                Route::get('role-wise-permissions/{id?}', 'roleWisePermissions')->name('backend.admin.role-wise-permissions');
            });

            Route::controller(PermissionController::class)->prefix('permissions')->group(function () {
                Route::get('/', 'index')->name('backend.admin.permissions');
                Route::post('create', 'store')->name('backend.admin.permissions.store');
                // Route::get('show/{id}', 'show')->name('backend.admin.roles.show');
                Route::put('update/{id}', 'update')->name('backend.admin.permissions.update');
                Route::get('delete/{id}', 'destroy')->name('backend.admin.permissions.delete');
            });
        });
        Route::resource('menus','Backend\MenuController');
        Route::put('menu-serial-update','Backend\MenuController@serialUpdate')->name('menu-serial-update');
        
        Route::post('sub-menus','Backend\SubMenuController@store')->name('sub-menus.store');
        Route::match(['put','patch'],'sub-menus/{id}','Backend\SubMenuController@update')->name('sub-menus.update');
        Route::delete('sub-menus/{id}','Backend\SubMenuController@destroy')->name('sub-menus.destroy');
    });
});

// ====================== /BACKEND ======================

Route::get('clear-all', function () {
    Artisan::call('optimize:clear');
    return redirect()->back();
});

Route::get('storage-link', function () {
    Artisan::call('storage:link');
    return redirect()->back();
});

Route::get('test', [TestController::class, 'test'])->name('test');

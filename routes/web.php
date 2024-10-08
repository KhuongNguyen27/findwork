<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\MetricsController;
use App\Http\Controllers\Admin\PopupController;
use App\Http\Controllers\JobPackageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\OperatingRegulationController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\UtilityController;

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
// Route::get('/', function () {
//     return view('website/employer/index');
// })->name('home');
// Route::get('/', function () {
//     return view('website.dashboards.index');
// })->name('home');


// Route::get('lang/{lang}',[LangController::class,'changeLanguage'])->name('lang');
Route::get('/sitemap', [SitemapController::class, 'index']);

Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');


Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/notifications', [NotificationController::class, 'getNotification'])->name('notifications.getNotification');
Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
// Route::post('/notifications/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/trang-chu/{job_type?}', [HomeController::class,'homejobs'])->name('jobs.homejobs');
Route::get('/viec-lam-hap-dan', [HomeController::class,'attractive'])->name('attractive');

Route::get('/viec-lam-trong-nuoc/{job_type?}', [JobController::class,'vnjobs'])->name('jobs.vnjobs');

Route::get('/viec-lam-ngoai-nuoc/{job_type?}', [JobController::class,'nnjobs'])->name('jobs.nnjobs');

Route::get('/cong-ty', [EmployeeController::class,'index'])->name('employees.index');

Route::get('/nganh-nghe/{slug}', [CareerController::class,'show'])->name('careers.show');
Route::get('/bai-viet/{slug}', [PostController::class,'show'])->name('posts.show');
Route::get('/quy-che-hoat-dong', [OperatingRegulationController::class,'index'])->name('htmlpages.quy-che-hoat-dong');



// Route::get('/{slug}', [PageController::class,'show'])->name('pages.show');

// Route::get('/trang/nha-tuyen-dung/{slug}', [PageController::class, 'show'])->name('pages1.show');
// Route::get('/trang/ung-vien/{slug}', [PageController::class, 'show'])->name('pages2.show');

Route::get('/importVNW', [ToolController::class,'importVNW']);

Route::group([
    'prefix' => 'website',
    'as' => 'website.'
], function () {
    Route::resource('jobpackage', JobPackageController::class)->names('jobpackage');
});

Route::prefix('themes')->group(function () {
    
    // Route::get('/employer', function () {
    //     return view('website/employer/index');
    // })->name('employer.index');

    Route::get('/contacts', function () {
        return view('website/contacts/index');
    })->name('contacts.index');

    Route::get('/aplications', function () {
        return view('website/aplications/index');
    })->name('aplications.index');

    // Route::get('/prices', function () {
    //     return view('website/prices/index');
    // })->name('prices.index');

    Route::get('/', function () {
        return view('website/dashboards/index');
    })->name('dashboards.index');

   

    Route::get('/post-job', function () {
        return view('website/dashboards/postjob/index');
    })->name('postjob.index');

    Route::get('/manage-job', function () {
        return view('website/dashboards/managejob/index');
    })->name('managejob.index');

    Route::get('/aplicants', function () {
        return view('website/dashboards/aplicants/index');
    })->name('aplicants.index');

    Route::get('/Shortlisteds', function () {
        return view('website/dashboards/Shortlisteds/index');
    })->name('Shortlisteds.index');

    Route::get('/pakages', function () {
        return view('website/dashboards/pakages/index');
    })->name('pakages.index');

    Route::get('/messages', function () {
        return view('website/dashboards/messages/index');
    })->name('messages.index');

    Route::get('/cv-manager', function () {
        return view('website/dashboards/cv-manager/index');
    })->name('cv-manager.index');

    Route::get('/resume-alerts', function () {
        return view('website/dashboards/resume-alerts/index');
    })->name('resume-alerts.index');

    Route::get('/change-password', function () {
        return view('website/dashboards/change-password/index');
    })->name('change-password.index');

    Route::get('/profile', function () {
        return view('website/dashboards/profile/index');
    })->name('profile.index');
});

Route::prefix('admin')->group(function () {
    Route::resource('countries', CountryController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('popups',PopupController::class);
    Route::resource('metrics', MetricsController::class);

});

Route::prefix('cong-cu')->group(function () {
    Route::get('tinh-luong-gross-net', [UtilityController::class, 'grossToNet'])->name('utilities.gross-to-net');
    Route::get('tinh-thue-thu-nhap-ca-nhan', [UtilityController::class, 'personalTax'])->name('utilities.personal-tax');
    Route::get('tinh-muc-huong-bao-hiem-that-nghiep', [UtilityController::class, 'unemploymentInsurance'])->name('utilities.unemployment-insurance');
    Route::get('tinh-bao-hiem-xa-hoi', [UtilityController::class, 'socialInsurance'])->name('utilities.social-insurance');
    Route::get('tinh-lai-suat-kep', [UtilityController::class, 'compoundInterest'])->name('utilities.compound-interest');
    Route::get('lap-ke-hoach-tiet-kiem', [UtilityController::class, 'savingsPlan'])->name('utilities.savings-plan');
});


Route::prefix('messages')->group(function () {
    // Hiển thị danh sách tin nhắn với người dùng khác
    Route::get('employee/{user_id}', [MessageController::class, 'index'])->name('messages.index');
    Route::get('staff/{user_id}', [MessageController::class, 'staff'])->name('staff.messages.index');

    // Hiển thị form gửi tin nhắn mới
    Route::get('/create/{user_id}', [MessageController::class, 'create'])->name('messages.create');

    // Xử lý gửi tin nhắn
    Route::post('/store/{user_id}', [MessageController::class, 'store'])->name('messages.store');
});

// Routes cho admin quản lý tin nhắn
Route::prefix('admin/messages')->group(function () {


    Route::get('/compose', [MessageController::class, 'compose'])->name('admin.messages.compose');

    // Xử lý gửi tin nhắn đến nhiều người dùng
    Route::post('/send', [MessageController::class, 'send'])->name('admin.messages.send');
    // Hiển thị danh sách tin nhắn giữa admin và người dùng
    Route::get('/{user_id}', [MessageController::class, 'adminMessages'])->name('admin.messages.index');

    // Hiển thị form tạo tin nhắn mới từ admin
    Route::get('/{user_id}/create', [MessageController::class, 'create'])->name('admin.messages.create');
    
    // Lưu tin nhắn mới từ admin
    Route::post('/{user_id}/store', [MessageController::class, 'stores'])->name('admin.messages.store');

    // Phản hồi tin nhắn từ admin
    Route::post('/reply/{message_id}', [MessageController::class, 'reply'])->name('admin.messages.reply');
    Route::get('/{user_id}/details', [MessageController::class, 'messageDetails'])->name('admin.messages.details');

    Route::get('/admin/messages/recipients', [MessageController::class, 'recipients'])->name('admin.messages.recipients');





});

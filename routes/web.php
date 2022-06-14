<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MissionVisionController;
use App\Http\Controllers\OurSkillController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentplanController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkProcessController;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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

// Route::get('/Services', 'App\Http\Controllers\PagesController@Services1');
// Route::get('/About', 'App\Http\Controllers\PagesController@About');
// Route::get('/Products', 'App\Http\Controllers\PagesController@Products1');

Route::redirect('/home', 'dashboard');

//route for home pages
Route::get('/', 'App\Http\Controllers\PagesController@index');

//route for contact us pages
Route::get('/contact', 'App\Http\Controllers\PagesController@Contact');

//route for products pages
Route::get('/products', 'App\Http\Controllers\ProductController@all');
Route::get('/products/show/{product}', 'App\Http\Controllers\ProductController@show')->name('product.details');

Route::get('/staunch_xcel', 'App\Http\Controllers\PagesController@StaunchXcel');
Route::get('/staunch_ems', 'App\Http\Controllers\PagesController@Staunch_EMS');
Route::get('/message_man', 'App\Http\Controllers\PagesController@Message_Man');

//route for services pages
Route::get('/services', 'App\Http\Controllers\ServiceController@all');
Route::get('/services/show/{service}', 'App\Http\Controllers\ServiceController@show')->name('service.details');
Route::get('/e_business_consulting', 'App\Http\Controllers\PagesController@E_Business_Consult');
Route::get('/website_&webapp_dev', 'App\Http\Controllers\PagesController@Website_Webapp_Dev');
Route::get('/mobile_app_dev', 'App\Http\Controllers\PagesController@Mobile_App_Dev');
Route::get('/domain_&hosting', 'App\Http\Controllers\PagesController@Domain_Hosting');
Route::get('/digital_marketing', 'App\Http\Controllers\PagesController@Digital_Marketing');
Route::get('/social_media_mgmt', 'App\Http\Controllers\PagesController@Social_Media_Mgmt');

//route for services pages
// Route::get('/about-us', 'App\Http\Controllers\PagesController@AboutUs');

//route for Pojects pages
Route::get('/projects', 'App\Http\Controllers\ProjectController@all');
Route::get('/projects/show/{project}', 'App\Http\Controllers\ProjectController@show')->name('project.details');


//route for search domain
Route::get('/searchdomain_widget', 'App\Http\Controllers\PagesController@Search_Domain');


// //route for post controllers
// Route::resource('post',  'App\Http\Controllers\PostController');

//route for Signin
//Route::get('login', 'App\Http\Controllers\PagesController@Login');
// Route::get('/login', [App\Http\Controllers\pagesController::class, 'Login'])->name('LOGIN');

//route for about pages
Route::get('/about_us', 'App\Http\Controllers\PagesController@About_Us');
Route::get('/our_policy', 'App\Http\Controllers\PagesController@Our_Policy');
Route::get('/who_we_are', 'App\Http\Controllers\AboutUsController@whoWeAre');
Route::get('/mission_and_vision', 'App\Http\Controllers\PagesController@Mission_And_Vision');

//route for Clientele
Route::get('/clientele', 'App\Http\Controllers\PagesController@Clientele');

Route::prefix('admin')->middleware(['auth', 'IsAdmin'])->group(function () {
    // Admin/user Route
    Route::resources([
        'users' => UserController::class,
        'products' => ProductController::class,
        'services' => ServiceController::class,
        'paymentplan' => PaymentplanController::class,
        'pricing' => PricingController::class,
        'subscriptions' => SubscriptionController::class,
        'about' => AboutUsController::class,
        'skills' => OurSkillController::class,
        'policy' => PolicyController::class,
        'contact' => ContactUsController::class,
        'missionvision' => MissionVisionController::class,
        'workprocess' => WorkProcessController::class,
        'homepage' => HomePageController::class,
        'projects' => ProjectController::class,

    ]);

    Route::prefix('product')->group(function () {

        Route::resource('category', ProductCategoryController::class, [
            'as' => 'product',
        ]);
    });

    Route::prefix('service')->group(function () {

        Route::resource('category', ServiceCategoryController::class, [
            'as' => 'service',
        ]);
    });


    Route::get('user/{user}/subscriptions', [UserController::class, 'subscriptions'])->name('user.subscription');


    // clientele
    Route::get('clientele', [UserController::class, 'clients'])->name('clients.index');
    Route::get('clientele/{user}/edit', [UserController::class, 'clientEdit'])->name('clients.edit');
    Route::put('clientele/{user}', [UserController::class, 'clientUpdate'])->name('clients.update');
    // Route::put('users/update/{user}', [UserController::class, 'adminUpdateUser'])->name('admin.user.update');
});

Route::post('pricing/get', [PricingController::class, 'getPricing'])->name('prices.get');


// single invoice
Route::get('invoice/print/{subscription}', function (Subscription $subscription) {
    return view('invoice.print', compact('subscription'));
})->name('invoice.print');

// all invoice
Route::get('invoices/print/{user}', function (User $user) {
    $subscriptions = Subscription::where('user_id', $user->id)->with(['pricing', 'creator', 'user', 'service'])->get();

    if ($subscriptions->count() > 0)
        return view('invoice.printmutiple', compact('subscriptions'));
    else
        return redirect()->back();
})->name('invoices.print');

// selected invoice
Route::post('multiple/invoice', 'App\Http\Controllers\SubscriptionController@multipleInvoice')->name('multiple.invoice');


//emailinvoice
Route::get('invoice/email/{subscription}', function (Subscription $subscription) {
    try {
        $res = Mail::send('invoice.email', compact('subscription'), function ($msg) use ($subscription) {

            $msg->from('info@staunchtechnologies.com', 'Staunch Tech');
            $msg->to($subscription->user->email, $subscription->user->company_name)->subject('Invoice');
        });

        return redirect()->back()->with('status', 'Email sent successfully');
    } catch (Exception $ex) {
        return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
    }
})->name('invoice.email');


// categories
Route::get('product/category/{product_category}', [ProductController::class, 'search'])->name('product.category.search');
Route::get('service/category/{service_category}', [ServiceController::class, 'search'])->name('service.category.search');
Route::get('project/category/{product_category}', [ProjectController::class, 'search'])->name('project.category.search');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

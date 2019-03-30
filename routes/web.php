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

Route::get('/', function () {
    return view('welcome');
})->name('auth.home');


Route::get('about', 'DashiController@about')->name('about.home');
Route::get('contact', 'DashiController@contact')->name('contact.home');
Route::get('privacy', 'DashiController@privacy')->name('privacy.home');
Route::get('boat-escrows', 'DashiController@robots')->name('robots.home');
Route::get('heavy-equipment-escrows', 'DashiController@steps')->name('steps.home');
Route::get('terms', 'DashiController@terms')->name('terms.home');
Route::get('machinery-escrows', 'DashiController@affiliate')->name('affiliate.home');

Route::get('construction-escrows', 'DashiController@construction')->name('construction.home');

Route::get('industrial-escrows', 'DashiController@industrial')->name('industry.home');

Route::get('online-escrows', 'DashiController@online')->name('online.home');

Route::get('property-escrows', 'DashiController@property')->name('property.home');

Route::get('vehicle-escrows', 'DashiController@vehicle')->name('vehicle.home');

Route::get('how-it-works', 'DashiController@how')->name('home.how');

Route::get('introducers-agents', 'DashiController@agents')->name('agents.home');

Route::get('anti-money-laudering', 'DashiController@money')->name('money.home');

Route::get('escrows', 'DashiController@escrow')->name('escrows.home');

Route::get('faq', 'DashiController@faq')->name('faq.home');

Route::get('api', 'DashiController@api')->name('api.home');



// Authorization
Route::get('login', 'Auth\SessionController@getLogin')->name('auth.login.form');
Route::post('login', 'Auth\SessionController@postLogin')->name('auth.login.attempt');
Route::any('logout', 'Auth\SessionController@getLogout')->name('auth.logout');

// Registration
Route::get('register', 'Auth\RegistrationController@getRegister')->name('auth.register.form');
Route::post('register', 'Auth\RegistrationController@postRegister')->name('auth.register.attempt');

Route::post('register-invitation', 'Auth\RegistrationController@postRegisterInv')->name('auth.register.invite');

// Activation
Route::get('activate/{code}', 'Auth\RegistrationController@getActivate')->name('auth.activation.attempt');
Route::get('resend', 'Auth\RegistrationController@getResend')->name('auth.activation.request');
Route::post('resend', 'Auth\RegistrationController@postResend')->name('auth.activation.resend');

// Password Reset
Route::get('password/reset/{code}', 'Auth\PasswordController@getReset')->name('auth.password.reset.form');
Route::post('password/reset/{code}', 'Auth\PasswordController@postReset')->name('auth.password.reset.attempt');
Route::get('password/reset', 'Auth\PasswordController@getRequest')->name('auth.password.request.form');
Route::post('password/reset', 'Auth\PasswordController@postRequest')->name('auth.password.request.attempt');

// Users
Route::resource('users', 'UserController');


Route::get('adduser', 'UserController@create')->name('user.create');

Route::get('account/{id}', 'UserController@viewAcc')->name('view.account');



// Roles
Route::resource('roles', 'RoleController');

// Dashboard
Route::get('dashboard', 'DashController@index')->name('dashboard');

Route::get('transactions', 'DashController@getTrans')->name('get.trans');

Route::get('deposits', 'DashController@getDep')->name('get.dep');

Route::get('withdrawals', 'DashController@getWith')->name('get.wit');

Route::get('payments', 'AdminController@payments')->name('get.pay');

Route::get('userwithdrwals', 'AdminController@withdrawal')->name('get.witu');

Route::get('plans', 'PlanController@index')->name('plans.index');

Route::get('addplan', 'PlanController@create')->name('plans.create');

Route::post('storeplan', 'PlanController@store')->name('plans.store');

Route::get('new-transaction', 'DashController@getTra')->name('get.tra');

Route::post('storetran', 'TransactionController@store')->name('tras.store');

Route::post('storeuser', 'TransactionController@updateUser')->name('tras.update');

Route::get('escrow-transaction-details/{tra}', 'TransactionController@show')->name('tras.get');

Route::get('invitation/{email}', 'DepositController@invitation')->name('invitation');



Route::get('plan-update/{plan}', ['as' => 'plan.update','uses' => 'PlanController@edit']);

Route::post('plan-store', ['as' => 'plan.store','uses' => 'PlanController@update']);

Route::delete('del-plan/{plan}', ['as' => 'del.plan','uses' => 'PlanController@destroy']);


Route::post('postpay', 'DepositController@store')->name('post.pay');

Route::post('posttran', 'TransactionController@storeTran')->name('post.tran');

Route::get('deposit-btc-qr/{dep}', 'DepositController@details');

Route::post('postwit', 'WithdrawalController@store')->name('post.wit');

Route::get('withdraw-btc-qr/{dep}', 'WithdrawalController@details');


Route::get('payments-update/{payment}', ['as' => 'payment.update','uses' => 'AdminController@update']);

Route::get('withdraw-update/{payment}', ['as' => 'wit.update','uses' => 'AdminController@witUpdate']);

Route::post('payments-store', ['as' => 'payment.store','uses' => 'AdminController@store']);

Route::post('wit-store', ['as' => 'wit.store','uses' => 'AdminController@witStore']);

Route::get('wallets', 'AccountController@index')->name('wallets.index');

Route::get('userwallet', 'DashController@getWallet')->name('userwallets.index');

Route::get('ref', 'DashController@getRef')->name('ref.index');

Route::get('account-update/{account}', ['as' => 'account.update','uses' => 'AdminController@acctUpdate']);

Route::post('acc-store', ['as' => 'acc.store','uses' => 'AdminController@accStore']);

Route::delete('del-acc/{account}', ['as' => 'del.acc','uses' => 'AdminController@dellAcc']);

Route::post('sendalert', 'DepositController@alert')->name('alert.send');

Route::post('updateplan', 'DepositController@update')->name('update.plan');
<?php

use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\store\RecruitJobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\company\StoreController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\user\PageTopController;
use App\Http\Controllers\user\UpdateProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\store\OccupationController;
use App\Http\Controllers\user\MyPageInforController;
use App\Http\Controllers\user\RegisterWorkerController;
use App\Http\Controllers\user\LoginWorkerController;
use App\Http\Controllers\user\ForgotPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|-----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// login và forgot password
Route::get('/login', [LoginController::class, 'formLogin'])->name('login');
Route::post('/login', [LoginController::class, 'formLoginStore'])->name('login-store');
Route::get('/password/forgot',[LoginController::class,'formForgotPassword'])->name('forgot-password-form');
Route::post('/password/forgot',[LoginController::class,'ShowResetLink'])->name('forgot-password-link');
Route::get('/password/reset/{token}',[LoginController::class,'showResetForm'])->name('reset-password-form');
Route::post('/password/reset',[LoginController::class,'ResetPassword'])->name('reset-password');


Route::middleware('checklogin')->group(function(){
    Route::get('/getDistrict/{id}', [CompanyController::class, 'getDistrict'])->name('getDistrict');
    //phân quyền dành cho admin
    Route::prefix('/admin')->middleware('decentralization')->group(function(){
        // Company
        Route::get('/search', [CompanyController::class, 'search'])->name('search');

        Route::get('/company', [CompanyController::class, 'formManagementCompany'])->name('formManagementCompany');
        Route::get('/addCompany', [CompanyController::class, 'formAddCompany'])->name('formAddCompany');
        Route::post('/addCompany', [CompanyController::class, 'addCompany'])->name('addCompany');
        Route::get('/editCompany/{id}', [CompanyController::class, 'formEditCompany'])->name('formEditCompany');
        Route::post('/updateCompany/{id}', [CompanyController::class, 'updateCompany'])->name('updateCompany');
        Route::post('/registerUser', [CompanyController::class, 'registerUser'])->name('registerUser');
        Route::post('/editAccount', [CompanyController::class, 'formEditAccount'])->name('formEditAccount');
        Route::post('/updateAccount/{id}', [CompanyController::class, 'updateAccount'])->name('updateAccount');
        Route::post('/updateCompany/registerUser/{id}', [CompanyController::class, 'registerUser_Company'])->name('registerUser_Company');
        Route::post('/editAccountCompany', [CompanyController::class, 'formEditAccount_Company'])->name('formEditAccount_Company');
        Route::post('/updateAccountCompany/{id}', [CompanyController::class, 'updateAccount_Company'])->name('updateAccount_Company');
        Route::get('/exportIntoCSV', [CompanyController::class, 'exportIntoCSV'])->name('exportIntoCSV');
        Route::post('/uploadFile/{id}', [CompanyController::class, 'uploadFile'])->name('uploadFile');


        // Job-Category
        Route::get('/job-category', [JobCategoryController::class, 'formManagementJobCategory'])->name('formManagementJobCategory');
        Route::post('/job-category', [JobCategoryController::class, 'createJobCategory']);
        Route::post('/job-category-edit', [JobCategoryController::class, 'editJobCategory'])->name('formEdit');
        Route::post('/job-category-update/{id}', [JobCategoryController::class, 'updateJobCategory']);

        // Skill
        Route::get('/index',[SkillController::class,'index'])->name('skills.index');
        Route::post('/skills',[SkillController::class,'store'])->name('skill.store');
        Route::get('/create', [SkillController::class, 'create'])->name('skill.create');
        Route::get('/skills/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit');
        Route::post('/skills/update', [SkillController::class, 'update'])->name('skill.update');

    });

    // phân quyền cho company
        Route::get('/searchStore', [StoreController::class, 'searchStore'])->name('searchStore');
     Route::prefix('company')->middleware('decentralization')->group(function(){
        // Store
        Route::get('/stores', [StoreController::class, 'formManagementStore'])->name('company.formManagementStore');
        Route::get('/addStore', [StoreController::class, 'formAddStore'])->name('company.formAddStore');
        Route::post('/addStore', [StoreController::class, 'addStore'])->name('company.addStore');
        Route::get('/editStore/{id}', [StoreController::class, 'formEditStore'])->name('company.formEditStore');
        Route::post('/updateStore/{id}', [StoreController::class, 'updateStore'])->name('company.updateStore');
        Route::post('/registerUser', [StoreController::class, 'registerUser'])->name('company.registerUser');
        Route::post('/editAccount', [StoreController::class, 'formEditAccount'])->name('company.formEditAccount');
        Route::post('/updateAccount/{id}', [StoreController::class, 'updateAccount'])->name('company.updateAccount');
        Route::post('/updateStore/registerUser/{id}', [StoreController::class, 'registerUser_Store'])->name('company.registerUser_Store');
        Route::post('/editAccountStore', [StoreController::class, 'formEditAccount_Store'])->name('company.formEditAccount_Store');
        Route::post('/updateAccountStore/{id}', [StoreController::class, 'updateAccount_Store'])->name('company.updateAccount_Store');
     });

    // phân quyền cho Store
    Route::prefix('store')->middleware('decentralization')->group(function(){
        // Occupation
        Route::get('/formCreateOccupation',[OccupationController::class, 'formCreateOccupation'])->name('occupation.formCreate');
        Route::get('/showCreateOccupation',[OccupationController::class, 'showCreateOccupation'])->name('occupation.show');
        Route::post('/formCreateOccupation',[OccupationController::class, 'createOccupation'])->name('occupation.create');
        Route::get('/formEditOccupation/edit/{id}', [OccupationController::class, 'formEditOccupation'])->name('occupation.edit');
        Route::get('/DeleteOccupation/delete/{id}', [OccupationController::class, 'formDeleteOccupation'])->name('occupation.delete');
        Route::post('/formUpdateOccupation/{id}', [OccupationController::class, 'updateOccupation']);

        // tuyển dụng job
        Route::get('/recruitJob',[RecruitJobController::class,'showListJob'])->name('RecruitJobs');
        Route::get('/SearchJob',[RecruitJobController::class,'SearchJob'])->name('SearchJob');
        Route::get('/detailJob/{id}',[RecruitJobController::class,'ShowDetailsJob'])->name('DetailJob');
        Route::get('/create/recruitJob/{id}',[RecruitJobController::class,'FormCreateJob'])->name('FormCreateRecruitJob');
        Route::post('/create/ConfirmAdd',[RecruitJobController::class,'ConfirmAddCreateJob'])->name('ConfirmAddCreateJob');
        Route::post('/create/StoreAdd',[RecruitJobController::class,'StoreAdd'])->name('StoreAdd');
        Route::get('/edit/recruitJob/{id}',[RecruitJobController::class,'EditRecruitJob'])->name('FormEditRecruitJob');
        Route::post('/edit/ConfirmEdit/{id}',[RecruitJobController::class,'ConfirmEditJob'])->name('ConfirmEditJob');
        Route::post('/edit/StoreEdit/{id}',[RecruitJobController::class,'StoreEdit'])->name('StoreEdit');
    });
 });
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
// Client
Route::get('/register/step1',[RegisterWorkerController::class,'formRegisterWorker1'])->name('formRegisterWorker1');
Route::get('/register/step2',[RegisterWorkerController::class,'formRegisterWorker2'])->name('formRegisterWorker2');
Route::post('/register',[RegisterWorkerController::class,'registerWorker2'])->name('registerWorker2');
Route::get('/register/confirm_phone',[RegisterWorkerController::class,'formConfirmPhone'])->name('formConfirmPhone');
Route::post('/register/confirmPhone',[RegisterWorkerController::class,'confirmPhone'])->name('confirmPhone');
Route::get('/register/set_password',[RegisterWorkerController::class,'formSetPassword'])->name('formSetPassword');
Route::post('/register/setPassword',[RegisterWorkerController::class,'setPassword'])->name('setPassword');
Route::get('/register/notification_success',[RegisterWorkerController::class,'formNotificationSuccess'])->name('formNotificationSuccess');

Route::get('/update_profile',[UpdateProfileController::class,'formUpdateProfile'])->name('formUpdateProfile');
Route::post('/updateProfile',[UpdateProfileController::class,'updateProfile'])->name('updateProfile');
Route::post('/change_password',[UpdateProfileController::class,'changePassword'])->name('changePassword');
//Route::get('/confirm_phone',[UpdateProfileController::class,'formConfirmPhone'])->name('formConfirmPhone');

//
//Route::get('/userDetailJob/{id}',[PageTopController::class,'detailJob'])->middleware('verified');

Route::get('/userDetailJob/{id}',[PageTopController::class,'detailJob'])->name('detailJob_toppage');
Route::get('/userMyPageInfomation',[MyPageInforController::class,'mypageInformation'])->name('mypageInformation_toppage');

// login worker
Route::get('loginworker',[LoginWorkerController::class,'formLogin'])->name('formLogin');
Route::post('loginworker',[LoginWorkerController::class,'validateform'])->name('validateform');
Route::get('forgotpassword',[ForgotPasswordController::class,'formForgot'])->name('formForgot');
Route::post('forgotpassword',[ForgotPasswordController::class,'ShowResetLink'])->name('ShowResetLink');
Route::get('confirmotp',[ForgotPasswordController::class,'confirmotpAction'])->name('confirmotpAction');
Route::post('confirmotp',[ForgotPasswordController::class,'confirmotp'])->name('confirmotp');
Route::get('/logout-worker', [LoginWorkerController::class, 'logout'])->name('worker.logout');
Route::get('resetpassword',[ForgotPasswordController::class,'resetpassword'])->name('resetpassword');
Route::post('resetpassword',[ForgotPasswordController::class,'resetpassword'])->name('resetpassword');
Route::get('acceptforgot',[ForgotPasswordController::class,'acceptforgotpassword'])->name('acceptforgotpassword');
Route::post('acceptforgot',[ForgotPasswordController::class,'acceptforgot'])->name('acceptforgot');
Route::post('modallogin',[modalLoginController::class,'formmodal'])->name('formmodal');


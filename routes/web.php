<?php
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
use App\Http\Controllers\backend\{
    tokenController as BackendTokenController,
    memberController,
    themesController,
    cardController,
    kategoriPekerjaanController,
    displayController as BackendDisplayController,  
    adminController,
    WaTemplatesController,
    produkController as BackendProductController,  
    profileController as BackendProfileController,
    konfigurasiController,    
};

use App\Http\Controllers\frontend\{
    HomeController
};

use App\Http\Controllers\admin\{
    profileController,
    tokenController
};


use App\Http\Controllers\{
    HomeController as FrontendHomeController,
    loginController as FrontendLoginController,     
    registerController,
    profilController,
    bisnisController,
    produkController as FrontendProductController, 
    fotoController,
    videoController,
    kartunamaController,
    displayController as FrontendDisplayController, 
    kontakController,
    agendaController,
    landingPageController,
    testimoniController
};


// Registration Routes
Route::get('/register/verify', [registerController::class, 'index']);
Route::post('/register/verify/login', [registerController::class, 'login'])->name('verify_login');
Route::get('/register', [registerController::class, 'register']);
Route::post('/register/create', [registerController::class, 'create'])->name('create_member');
Route::get('/register/option', [registerController::class, 'option']);
Route::post('/register/common', [registerController::class, 'register_common'])->name('send-regis');

// Login Routes
Route::get('/c-panel', [FrontendLoginController::class, 'index'])->name('login');
Route::get('/backend', [FrontendLoginController::class, 'backend'])->name('backend');
Route::get('/login', [FrontendLoginController::class, 'index'])->name('login');
Route::get('/c-panel/reset', [FrontendLoginController::class, 'reset']);
Route::get('/backend/reset', [FrontendLoginController::class, 'reset_backend']);
Route::view('/lupa_password_backend', 'backend.lupa_password');
Route::post('/lupa_password_backend', [FrontendLoginController::class, 'lupa_password_backend'])->name('lupa_password_backend');
Route::get('/ubah_password_backend/{id}', [FrontendLoginController::class, 'ubah_password_backend']);
Route::post('/ganti_password_backend', [FrontendLoginController::class, 'proses_ubah_password_backend'])->name('ganti_password_backend');

// Password Reset Routes
Route::view('/lupa_password', 'admin.lupa_password');
Route::post('/lupa_password', [FrontendLoginController::class, 'lupa_password'])->name('lupa_password');
Route::get('/ubah_password/{id}', [FrontendLoginController::class, 'ubah_password']);
Route::post('/ganti_password', [FrontendLoginController::class, 'proses_ubah_password'])->name('ganti_password');

// Frontend Routes
Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'find'])->name('find_member');
Route::get('/findmember/kategori-pekerjaan/{s}', [HomeController::class, 'findByKategori']);
Route::get('/findmember/sub-kategori-pekerjaan/{s}', [HomeController::class, 'findBySubKategori']);
Route::get('/findmember/propinsi/{s}', [HomeController::class, 'findByProvince']);
Route::get('/findmember/kota/{s}', [HomeController::class, 'findByCity']);
Route::get('/findmember/kecamatan/{s}', [HomeController::class, 'findBySubdistrict']);
Route::get('/sub-kategori-pekerjaan/{id}', [profilController::class, 'sub_kategori_pekerjaan']);
Route::get('/kategori-pekerjaan/{id}', [profilController::class, 'kategori_pekerjaan']);

// Other Routes
Route::get('/contact', [HomeController::class, 'kontak']);
Route::get('/member', [HomeController::class, 'member']);
Route::get('/city/find/{id}', [profilController::class, 'city_list']);
Route::get('/subdistrict/find/{id}', [profilController::class, 'subdistrict_list']);
Route::get('/bisnis', [bisnisController::class, 'index']);
Route::get('/produk', [FrontendProductController::class, 'index'])->name('findproduk');
Route::get('/profil', [profilController::class, 'index']);
Route::get('/foto', [fotoController::class, 'index']);
Route::get('/video', [videoController::class, 'index']);
Route::get('/kartunama/{id}', [kartunamaController::class, 'kartu_nama']);
Route::get('/kartunama', [HomeController::class, 'index']);
Route::get('/bisnis1/{id}', [bisnisController::class, 'detilBisnis1']);
Route::get('/bisnis/{id}', [bisnisController::class, 'detilBisnis']);
Route::get('/bisnis/produk/{id}', [bisnisController::class, 'produkBisnis'])->name('findprodukbisnis');
Route::get('/bisnis1/produk/{id}', [bisnisController::class, 'produkBisnis1'])->name('findprodukbisnis1');
Route::get('/produk/{member}/{id}', [FrontendProductController::class, 'detilProduk']);
Route::get('/produk1/{member}/{id}', [FrontendProductController::class, 'detilProduk1']);
Route::get('/display/{member}/{id}', [FrontendDisplayController::class, 'index']);
Route::get('/kontak', [kontakController::class, 'index']);
Route::get('/agenda', [agendaController::class, 'index']);
Route::get('/agenda1', [agendaController::class, 'index1']);
Route::get('/agenda/{id}', [agendaController::class, 'agenda']);
Route::get('/agenda1/{id}', [agendaController::class, 'agenda1']);
Route::get('/shared/{member}/{id}/{slug}', [landingPageController::class, 'shared']);
Route::post('/send', [landingPageController::class, 'send'])->name('send');
Route::get('/landing/{id}/{slug}', [landingPageController::class, 'index']);

// Testimonial Routes
Route::get('/testimoni/{slug}', [testimoniController::class, 'index']);
Route::get('/testimoni1/{slug}', [testimoniController::class, 'index1']);
Route::get('/displaytestimoni/{slug}', [testimoniController::class, 'index']);
Route::get('/displaytestimoni1/{slug}', [testimoniController::class, 'index1']);
Route::get('/testimoni/detil/{member}/{id}', [testimoniController::class, 'detil']);
Route::get('/testimoni1/detil/{member}/{id}', [testimoniController::class, 'detil1']);
Route::get('/displaytestimoni/detil/{member}/{id}', [testimoniController::class, 'detil']);
Route::get('/displaytestimoni1/detil/{member}/{id}', [testimoniController::class, 'detil1']);

// Public routes
Route::get('/registrasi', function () {
    return view('templates.basic.register');
});
Route::view('welcome', 'templates.basic.welcome');
Route::get('logout', [FrontendLoginController::class, 'logout'])->name('logout');
Route::get('logout_backend', [FrontendLoginController::class, 'logout_backend'])->name('logout_backend');

// Routes with backend middleware
Route::group(['middleware' => 'backendMiddleware'], function () {
    Route::get('/backend/token', [BackendTokenController::class, 'index']);
    Route::get('/backend/find/token/{id}', [BackendTokenController::class, 'find']);
    Route::get('/backend/generate/token/{id}', [BackendTokenController::class, 'generate']);
    Route::get('/backend/sendwa/token/{id}', [BackendTokenController::class, 'sendwa']);
    Route::get('/backend/import', [memberController::class, 'import_member']);
    Route::get('/backend/themes', [themesController::class, 'index']);
    Route::get('/backend/themes/find/{id}', [themesController::class, 'find']);
    Route::post('/backend/themes/save', [themesController::class, 'save'])->name('save_themes');
    Route::post('/backend/themes/update', [themesController::class, 'update'])->name('update_themes');
    Route::get('/backend/themes/delete/{id}', [themesController::class, 'delete']);
    Route::get('/backend/card', [cardController::class, 'index']);
    Route::get('/backend/card/find/{id}', [cardController::class, 'find']);
    Route::post('/backend/card/save', [cardController::class, 'save'])->name('save_card');
    Route::post('/backend/card/update', [cardController::class, 'update'])->name('update_card');
    Route::get('/backend/card/delete/{id}', [cardController::class, 'delete']);
    Route::get('/backend/member', [memberController::class, 'index']);
    Route::get('/backend/member/find/{id}', [memberController::class, 'find']);
    Route::get('/backend/member/bisnis/{id}', [memberController::class, 'member_bisnis']);
    Route::get('/backend/member/produk/{id}', [memberController::class, 'member_produk']);
    Route::get('/backend/member/photo/{id}', [memberController::class, 'member_photo']);
    Route::get('/backend/member/video/{id}', [memberController::class, 'member_video']);
    Route::get('/backend/member/testimoni/{id}', [memberController::class, 'member_testimoni']);
    Route::get('/backend/member/bank/{id}', [memberController::class, 'member_bank']);
    Route::get('/backend/member/banner/{id}', [memberController::class, 'member_banner']);
    Route::get('/backend/member/welcome/{id}', [memberController::class, 'member_welcome']);
    Route::get('/backend/member/wa-template/{id}', [memberController::class, 'member_wa_template']);
    Route::get('/backend/member/ubah-password/{id}', [memberController::class, 'member_ubah_password']);
    Route::post('/backend/member/ubah-password/', [memberController::class, 'proses_ubah_password_member'])->name('ubah_password_member');
    Route::get('/backend/member/profil/{id}', [memberController::class, 'member_profil']);
    Route::get('/backend/member/edit/{id}', [memberController::class, 'edit_member']);
    Route::get('/backend/member/input', [memberController::class, 'input_member']);
    Route::get('/backend/member/cekusername/{username}', [memberController::class, 'findusername']);
    Route::post('/backend/member/save', [memberController::class, 'create_member'])->name('save_input_member');
    Route::post('/backend/member/update', [memberController::class, 'update_member'])->name('save_edit_member');
    Route::get('/backend/member/delete/{id}', [memberController::class, 'delete']);
    Route::get('/backend/kategori-pekerjaan', [kategoriPekerjaanController::class, 'index']);
    Route::get('/backend/kategori-pekerjaan/findall', [kategoriPekerjaanController::class, 'findall']);
    Route::post('/backend/kategori-pekerjaan/save', [kategoriPekerjaanController::class, 'save'])->name('save_kategori_pekerjaan');
    Route::post('/backend/kategori-pekerjaan/update', [kategoriPekerjaanController::class, 'update'])->name('update_kategori_pekerjaan');
    Route::get('/backend/kategori-pekerjaan/delete/{id}', [kategoriPekerjaanController::class, 'delete']);
    Route::get('/backend/sub-kategori-pekerjaan', [kategoriPekerjaanController::class, 'sub_index']);
    Route::post('/backend/sub-kategori-pekerjaan/save', [kategoriPekerjaanController::class, 'sub_save'])->name('save_sub_kategori_pekerjaan');
    Route::post('/backend/sub-kategori-pekerjaan/update', [kategoriPekerjaanController::class, 'sub_update'])->name('update_sub_kategori_pekerjaan');
    Route::get('/backend/sub-kategori-pekerjaan/delete/{id}', [kategoriPekerjaanController::class, 'sub_delete']);
    Route::get('/backend/sub-kategori-pekerjaan/{id}', [kategoriPekerjaanController::class, 'sub_kategori_pekerjaan_find']);
    
    Route::post('/backend/change_password/update', [adminController::class, 'proses_ubah_password'])->name('proses_ubah_password_backend');
    Route::get('/backend/dashboard', [FrontendHomeController::class, 'dashboard_backend']);
    Route::get('/backend/profile', [BackendProfileController::class, 'index']);
    Route::post('/backend/profile', [BackendProfileController::class, 'update'])->name('update_profile_admin');
    Route::get('/backend/ubah_password', [BackendProfileController::class, 'ubah_password']);
    Route::post('/backend/ubah_password', [BackendProfileController::class, 'proses_ubah_password'])->name('ubah_password_backend');
    Route::get('/backend/admin', [adminController::class, 'index']);
    Route::post('/backend/admin/save', [adminController::class, 'create'])->name('save_admin_backend');
    Route::post('/backend/admin/update', [adminController::class, 'update'])->name('update_admin_backend');
    Route::get('/backend/admin/delete/{id}', [adminController::class, 'delete'])->name('delete_admin_backend');
    Route::get('/backend/admin/find/{id}', [adminController::class, 'find']);

    Route::post('/backend/testimoni/save', [testimoniController::class, 'create'])->name('save_testimoni_backend');
    Route::post('/backend/testimoni/update', [testimoniController::class, 'update'])->name('update_testimoni_backend');
    Route::get('/backend/testimoni/delete/{id}', [testimoniController::class, 'delete'])->name('delete_testimoni_backend');
    Route::get('/backend/testimoni/find/{id}', [testimoniController::class, 'find']);
    Route::get('/backend/testimoni', [testimoniController::class, 'index']);
    Route::post('/backend/wa-templates', [WaTemplatesController::class, 'update'])->name('update_wa_templates_backend');
    Route::get('/backend/wa-templates', [WaTemplatesController::class, 'index']);
    Route::post('/backend/photo-profile', [BackendProfileController::class, 'proses_upload_foto'])->name('upload_foto_backend');
    Route::get('/backend/photo-profile', [BackendProfileController::class, 'upload_foto'])->name('upload_foto_profile');
    Route::get('/backend/welcome_note', [BackendProfileController::class, 'welcome_note']);
    Route::post('/backend/welcome_note/update', [BackendProfileController::class, 'update_welcome_note'])->name('update_welcome_note_backend');
    Route::post('/backend/produk/save', [BackendProductController::class, 'create'])->name('save_produk_backend');
    Route::post('/backend/produk/update', [BackendProductController::class, 'update'])->name('update_produk_backend');
    Route::get('/backend/produk/delete/{id}', [BackendProductController::class, 'delete'])->name('delete_produk_backend');
    Route::get('/backend/produk/find/{id}', [BackendProductController::class, 'find']);
    Route::get('/backend/produk', [BackendProductController::class, 'index']);

    Route::post('/backend/display/save', [BackendDisplayController::class, 'create'])->name('display_produk');
    Route::post('/backend/display/update', [BackendDisplayController::class, 'update'])->name('update_display');
    Route::get('/backend/display/delete/{id}', [BackendDisplayController::class, 'delete'])->name('delete_display');
    Route::get('/backend/display/find/{id}', [BackendDisplayController::class, 'find']);
    Route::get('/backend/display', [BackendDisplayController::class, 'index']);
});

// Admin Routes with login middleware
Route::group(['middleware' => 'loginMiddleware'], function () {
    Route::get('/admin/token', [tokenController::class, 'index']);
    Route::get('/admin/find/token/{id}', [tokenController::class, 'find']);
    Route::get('/admin/generate/token/{id}', [tokenController::class, 'generate']);
    Route::get('/admin/sendwa/token/{id}', [tokenController::class, 'sendwa']);
    Route::get('/admin/profile', [profileController::class, 'index']);
    Route::post('/admin/profile', [profileController::class, 'update'])->name('update_profile_admin');
    Route::get('/admin/ubah_password', [profileController::class, 'ubah_password']);
    Route::post('/admin/ubah_password', [profileController::class, 'proses_ubah_password'])->name('ubah_password_backend');
    Route::get('/admin/dashboard', [FrontendHomeController::class, 'dashboard_backend']);
});


Route::post('/dashboard', [FrontendLoginController::class, 'login'])->name('proses_login');
Route::post('/backend/dashboard', [FrontendLoginController::class, 'login_backend'])->name('proses_login_backend');

Route::get('/kartumember/{id}', [kartumemberController::class, 'index']);
Route::get('/{id}', [FrontendHomeController::class, 'replika']);
Route::get('/kartunama/{id}', [kartunamaController::class, 'index']);
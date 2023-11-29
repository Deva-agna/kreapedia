<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriFaqController;
use App\Http\Controllers\KategoriLiterasiController;
use App\Http\Controllers\KreditController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LiterasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileCompanyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubServiceController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeSectionController;
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


Route::get('/', [LandingPageController::class, 'index']);
// Tabungan
Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan');
Route::get('/tabungan/{slug}', [TabunganController::class, 'deskripsi'])->name('deskripsi.tabungan');
// Deposito
Route::get('/deposito', [DepositoController::class, 'index'])->name('deposito');
Route::get('/deposito/{slug}', [DepositoController::class, 'deskripsi'])->name('deskripsi.deposito');
// Kredit
Route::get('/kredit', [KreditController::class, 'index'])->name('kredit');
Route::get('/kredit/{slug}', [KreditController::class, 'deskripsi'])->name('deskripsi.kredit');
// About Us
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.us');
// FAQ
Route::get('/page-faq', [FaqController::class, 'pageFaq'])->name('page.faq');
// Event
Route::get('page-event', [EventController::class, 'pageEvent'])->name('page.event');
Route::get('/detail-event/{event:slug}', [EventController::class, 'detailEvent'])->name('detail.event');
// Service
Route::get('/page-service', [ServiceController::class, 'pageService'])->name('page.service');
// Berita
Route::get('/page-berita', [BeritaController::class, 'pageBerita'])->name('page.berita');
Route::get('/detail-berita/{berita:slug}', [BeritaController::class, 'detailBerita'])->name('detail.berita');
// Literasi
Route::get('/page-literasi', [LiterasiController::class, 'pageLiterasi'])->name('page.literasi');
Route::get('/detail-literasi/{literasi:slug}', [LiterasiController::class, 'detailLiterasi'])->name('detail.literasi');
// Contact
Route::get('/page-contact', [ProfileCompanyController::class, 'pageContact'])->name('page.contact');



Route::get('/login/page', [LoginController::class, 'index'])->name('login.page');
Route::post('/login/store', [LoginController::class, 'authenticate'])->name('login.store');

Route::group(['middleware' => ['auth']], function () {
    Route::put('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth', 'checkRole:sadmin']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user:slug}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::patch('/user-reset/{user:slug}/pass', [UserController::class, 'resetPass'])->name('user.reset.pass');
    Route::post('/user/{user:slug}/status', [UserController::class, 'status'])->name('user.status');
    Route::delete('/user/{user:slug}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::group(['middleware' => ['auth', 'checkRole:sadmin,admin']], function () {

    // Profile Update
    Route::get('/user-profile/edit', [UserController::class, 'profileEdit'])->name('user.profile.edit');
    Route::put('/user-profile/update', [UserController::class, 'profileUpdate'])->name('user.profile.update');
    Route::put('/user-profile/update-password', [UserController::class, 'updatePassword'])->name('user.profile.update.password');

    // Dashboard

    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    // ==========
    // kategori berita
    // ==========

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori:slug}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori:slug}/destroy', [KategoriController::class, 'destroy'])->name('kategori.destroy');



    // ==========
    // berita
    // ==========

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita:slug}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/update', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita:slug}/destroy', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::patch('/berita/{berita:slug}/status', [BeritaController::class, 'status'])->name('berita.status');



    // ==========
    // Service
    // ==========

    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/{service:slug}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/update', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{service:slug}/destroy', [ServiceController::class, 'destroy'])->name('service.destroy');
    Route::patch('/service/{service:slug}/status', [ServiceController::class, 'status'])->name('service.status');



    // ==========
    // Sub Service
    // ==========

    Route::get('/sub-service/{service:slug}', [SubServiceController::class, 'index'])->name('sub.service');
    Route::get('/sub-service/{service:slug}/create', [SubServiceController::class, 'create'])->name('sub.service.create');
    Route::post('/sub-service/store', [SubServiceController::class, 'store'])->name('sub.service.store');
    Route::get('/sub-service/{sub_service:slug}/edit', [SubServiceController::class, 'edit'])->name('sub.service.edit');
    Route::put('/sub-service/update', [SubServiceController::class, 'update'])->name('sub.service.update');
    Route::delete('/sub-service/{sub_service:slug}/destroy', [SubServiceController::class, 'destroy'])->name('sub.service.destroy');



    // ==========
    // Event
    // ==========

    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{event:slug}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/update', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{event:slug}/destroy', [EventController::class, 'destroy'])->name('event.destroy');
    Route::patch('/event/{event:slug}/status', [EventController::class, 'status'])->name('event.status');



    // ==========
    // Testimoni
    // ==========

    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
    Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('testimoni.create');
    Route::post('/testimoni/store', [TestimoniController::class, 'store'])->name('testimoni.store');
    Route::get('/testimoni/{testimoni:slug}/edit', [TestimoniController::class, 'edit'])->name('testimoni.edit');
    Route::put('/testimoni/update', [TestimoniController::class, 'update'])->name('testimoni.update');
    Route::delete('/testimoni/{testimoni:slug}/destroy', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');
    Route::patch('/testimoni/{testimoni:slug}/status', [TestimoniController::class, 'status'])->name('testimoni.status');



    // ==========
    // Kategori Literasi
    // ==========

    Route::get('/kategori-literasi', [KategoriLiterasiController::class, 'index'])->name('kategori.literasi');
    Route::post('/kategori-literasi/store', [KategoriLiterasiController::class, 'store'])->name('kategori.literasi.store');
    Route::get('/kategori-literasi/{kategori_literasi:slug}/edit', [KategoriLiterasiController::class, 'edit'])->name('kategori.literasi.edit');
    Route::put('/kategori-literasi/update', [KategoriLiterasiController::class, 'update'])->name('kategori.literasi.update');
    Route::delete('/kategori-literasi/{kategori_literasi:slug}/destroy', [KategoriLiterasiController::class, 'destroy'])->name('kategori.literasi.destroy');



    // ==========
    // Literasi
    // ==========

    Route::get('/literasi', [LiterasiController::class, 'index'])->name('literasi');
    Route::get('/literasi/create', [LiterasiController::class, 'create'])->name('literasi.create');
    Route::post('/literasi/store', [LiterasiController::class, 'store'])->name('literasi.store');
    Route::get('/literasi/{literasi:id}/preview', [LiterasiController::class, 'preview'])->name('literasi.preview');
    Route::get('/literasi/{literasi:slug}/edit', [LiterasiController::class, 'edit'])->name('literasi.edit');
    Route::put('/literasi/update', [LiterasiController::class, 'update'])->name('literasi.update');
    Route::patch('/literasi/{literasi:slug}/status', [LiterasiController::class, 'status'])->name('literasi.status');
    Route::delete('/literasi/{literasi:slug}/destroy', [LiterasiController::class, 'destroy'])->name('literasi.destroy');



    // ==========
    // Profile Company
    // ==========

    Route::get('/profile-company', [ProfileCompanyController::class, 'index'])->name('profile.company');
    Route::post('/profile-company/update/informasi', [ProfileCompanyController::class, 'updateInformasi'])->name('profile.company.update.informasi');
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');
    Route::get('/about/visi-misi/edit', [AboutController::class, 'editVisiMisi'])->name('about.visi.misi.edit');
    Route::put('/about/visi-misi/update', [AboutController::class, 'updateVisiMisi'])->name('about.visi.misi.update');



    // ==========
    // Kategori FAQ
    // ==========

    Route::get('/kategori-faq', [KategoriFaqController::class, 'index'])->name('kategori.faq');
    Route::post('/kategori-faq/store', [KategoriFaqController::class, 'store'])->name('kategori.faq.store');
    Route::get('/kategori-faq/{kategori_faq:slug}/edit', [KategoriFaqController::class, 'edit'])->name('kategori.faq.edit');
    Route::put('/kategori-faq/update', [KategoriFaqController::class, 'update'])->name('kategori.faq.update');
    Route::delete('/kategori-faq/{kategori_faq:slug}/destroy', [KategoriFaqController::class, 'destroy'])->name('kategori.faq.destroy');



    // ==========
    // FAQ
    // ==========

    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/{faq:slug}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/update', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq:slug}/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');



    // ==========
    // Welcome Section
    // ==========

    Route::get('/welcome-section', [WelcomeSectionController::class, 'index'])->name('welcome.section');
    Route::put('/welcome-section/update', [WelcomeSectionController::class, 'update'])->name('welcome.section.update');
});

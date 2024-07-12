<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirmedController;
use App\Http\Controllers\DirumController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ITController;
use App\Http\Controllers\KabagHumasController;
use App\Http\Controllers\KabagADMController;
use App\Http\Controllers\KabagSDIController;
use App\Http\Controllers\KabagIPSRSController;
use App\Http\Controllers\KainsController;
use App\Http\Controllers\KeperawatanController;
use App\Http\Controllers\KomiteController;
use App\Http\Controllers\ManajerController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\NotadinasController;
use App\Http\Controllers\SuratSekertarisController;
use App\Http\Controllers\ViewPDFController;
use App\Models\Sekertaris;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::get('/register', [RegistrationController::class, 'show'])->name('register');
Route::post('/register', [RegistrationController::class, 'processRegistration']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login'); 

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return view('admin.admin');
})->middleware('role:admin')->name('admin.admin');

Route::get('/director', function () {
    return view('director.director');
})->middleware('role:director')->name('director.director');

Route::get('/sekertaris', function () {
    return view('sekertaris.sekertaris');
})->middleware('role:secretary')->name('sekertaris.sekertaris');

Route::get('/komite', function () {
    return view('komitetim.komite');
})->middleware('role:komitetim')->name('komitetim.komite');

Route::get('/dirmed', function () {
    return view('dirmed.index');
})->middleware('role:medis')->name('dirmed.index');

Route::get('/dirum', function () {
    return view('dirum.index');
})->middleware('role:umum')->name('dirum.index');

Route::get('/administrasi', function () {
    return view('manajer.adm&keu.index');
})->middleware('role:mak')->name('manajer.adm&keu.index');

Route::get('/sdi&umum', function () {
    return view('manajer.sdi&umum.index');
})->middleware('role:msu')->name('manajer.sdi&umum.index');

Route::get('/kep', function () {
    return view('keperawatan.index');
})->middleware('role:kep')->name('keperawatan.index');

Route::get('/keperawatan', function () {
    return view('manajer.keperawatan.index');
})->middleware('role:mkk')->name('manajer.keperawatan.index');

Route::get('/manajerIT', function () {
    return view('manajer.timkhususit.index');
})->middleware('role:tkit')->name('manajer.timkhususit.index');

Route::get('/manajerPelayanan', function () {
    return view('manajer.pelayanan.index');
})->middleware('role:mppm')->name('manajer.pelayanan.index');

Route::get('/manajerKsm', function () {
    return view('manajer.ksm.index');
})->middleware('role:ksmmanajer')->name('manajer.ksm.index');

Route::get('/timkhususmedis', function () {
    return view('manajer.timkhususmedis.index');
})->middleware('role:tkmmanajer')->name('manajer.timkhususmedis.index');

Route::get('/it', function () {
    return view('it.index');
})->middleware('role:tku')->name('it.index');

Route::get('/kains', function () {
    return view('kains.index');
})->middleware('role:kains')->name('kains.index');

Route::get('/humas', function () {
    return view('humas.index');
})->middleware('role:kabaghumas')->name('humas.index');

Route::get('/sdi', function () {
    return view('SDI.index');
})->middleware('role:kabagsdi')->name('SDI.index');

Route::get('/ipsrs', function () {
    return view('ipsrs.index');
})->middleware('role:kabagipsrs')->name('ipsrs.index');

Route::get('/administrasi', function () {
    return view('administrasi.index');
})->middleware('role:kabagadm')->name('administrasi.index');



Route::get('/register', [AdminController::class, 'show'])->name('register');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edituser');
Route::put('/admin/edit/{id}', [AdminController::class, 'update'])->name('admin.updateuser');
Route::delete('/admin/edit/{id}', [AdminController::class, 'destroy'])->name('admin.destroyuser');


Route::get('/info', [SuratController::class, 'show'])->name('director.info');
Route::get('/suratmasuk', [SuratController::class, 'showSurat'])->name('director.suratsekertaris');
Route::get('/notadinasdirekturumum', [SuratController::class, 'showNotadinas'])->name('director.notadinas');
Route::get('/director', [SuratController::class, 'hitung'])->name('director.director');
Route::get('/surat', [SuratController::class, 'index'])->name('director.tambahsurat');
Route::get('/surat/create', [SuratController::class, 'create'])->name('director.buat');
Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
Route::get('/unduh/{id}', [DownloadController::class, 'DownloadSekertaris'])->name('downloadssekertarispdf');
Route::get('/view/{id}', [ViewPDFController::class, 'ViewSekertarisPDF'])->name('viewsekertarispdf');
Route::delete('/info/{id}', [SuratController::class, 'destroy'])->name('info.destroy');
Route::get('/director/{id}/edit', [NotadinasController::class, 'edit'])->name('director.edit');
Route::put('/director/{id}', [NotadinasController::class, 'update'])->name('director.update');







Route::get('/sekertaris', [SuratSekertarisController::class, 'hitung'])->name('sekertaris.sekertaris');
Route::get('/notadinassemua', [SuratSekertarisController::class, 'ShowNdinas'])->name('sekertaris.notadinas');
Route::get('/semuasurat', [SuratSekertarisController::class, 'showSekertarisSemuaSurat'])->name('sekertaris.semuasurat');
Route::get('/tambahsuratsekertaris', [SuratSekertarisController::class, 'index'])->name('sekertaris.tambahsurat');
Route::get('/tambahsuratsekertaris', [SuratSekertarisController::class, 'create'])->name('sekertaris.tambahsurat');
Route::post('/sekertaris/store', [SuratSekertarisController::class, 'store'])->name('sekertaris.store');
Route::get('/infosurat', [SuratSekertarisController::class, 'show'])->name('sekertaris.show');
Route::get('/sekertaris/{id}/edit', [SuratSekertarisController::class, 'edit'])->name('sekertaris.edit');
Route::put('/sekertaris/{id}', [SuratSekertarisController::class, 'update'])->name('sekertaris.update');
Route::delete('/sekertaris/{id}', [SuratSekertarisController::class, 'destroy'])->name('sekertaris.destroy');
Route::get('/download/{id}', [SuratSekertarisController::class, 'download'])->name('surat.download');
Route::get('/pdf/pesan', [ViewPDFController::class, 'ViewNotadinasPDF'])->name('viewnotadinaspdf');
Route::get('/pdf/{id}', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisipdf');
Route::delete('/delete/{id}', [SuratSekertarisController::class, 'destroy'])->name('delete.destroy');
Route::get('/edit-teruskan/{id}', [SuratSekertarisController::class, 'editTeruskan'])->name('editTeruskan');
Route::post('/update-teruskan/{id}', [SuratSekertarisController::class, 'updateTeruskan'])->name('updateTeruskan');





Route::get('/infosuratkomite', [KomiteController::class, 'show'])->name('komite.infosurat');
Route::get('/pdf/{id}/komite', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisikomite');
Route::get('/pdf/{id}/notadinas', [ViewPDFController::class, 'ViewNotadinasPDF'])->name('viewnotadinaspdf');
Route::get('/download/{id}', [DownloadController::class, 'DownloadNotadinas'])->name('downloadnotadinas');
Route::post('/tambahkomite', [SuratSekertarisController::class, 'store'])->name('komitetim.store');
Route::get('/infosuratnotadinaskomite', [NotadinasController::class, 'show'])->name('komitetim.infosuratnotadinas');
Route::get('/infosuratnotadinas', [NotadinasController::class, 'index'])->name('komite.infosuratnotadinas');
Route::get('/tambahsuratkomite', [NotadinasController::class, 'tambahsurat'])->name('komite.tambahsurat');
Route::post('/komite/notadinas', [NotadinasController::class, 'store'])->name('notadinas.store');


Route::get('/infosuratdirmed', [DirmedController::class, 'showDirmed'])->name('dirmed.infosurat');
Route::get('/infosuratnotadinasdirmed', [DirmedController::class, 'showNotadinasdirmed'])->name('dirmed.notadinas');
Route::get('/pdf/{id}/dirmeddispo', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisidirmed');
Route::get('/pdf/{id}/dirmed', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('viewnotadinasdirmed');




Route::get('/infosuratdirum', [DirumController::class, 'showDirum'])->name('dirum.infosurat');
Route::get('/notadinas', [SuratController::class, 'showNotadinas'])->name('dirum.notadinas');
Route::get('/infosuratnotadinasdirum', [DirumController::class, 'showNotaDinas'])->name('dirum.notadinas');
Route::get('/pdf/{id}/dirumdspo', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisipdf');
Route::get('/pdf/{id}/dirum', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('viewnotadinasdirum');



Route::get('/suratdisposisiadministrasi', [KomiteController::class, 'showAdministrasi'])->name('manajer.adm&keu.infosurat');
Route::get('/infosuratnotadinasadministrasi', [NotadinasController::class, 'showNotaadministrasi'])->name('manajer.adm&keu.infosuratnotadinasadministrasi');
Route::get('/manajerview/{id}/Administrasi', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('notadinasadministrasi');




Route::get('/infosuratnotadinas', [ITController::class, 'show'])->name('it.infosuratnotadinas');
Route::get('/disposisiit', [ITController::class, 'showIT'])->name('it.infosurat');
Route::get('/tambahsurat', [ITController::class, 'tambahsurat'])->name('it.tambahsurat');
Route::post('/notadinas', [ITController::class, 'store'])->name('it.store');
Route::get('/pdf/{id}/it', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisi');
Route::get('/pdf/{id}/notadinasit', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('viewnotadinas');
Route::get('/downloadit/{id}', [DownloadController::class, 'DownloadDisposisi'])->name('downloaddisposisi');


Route::get('/infosuratnotadinashumas', [KabagHumasController::class, 'show'])->name('humas.infosuratnotadinas');
Route::get('/disposisihumas', [KabagHumasController::class, 'showhumas'])->name('humas.infosurat');
Route::get('/tambahsurathumas', [KabagHumasController::class, 'tambahsurat'])->name('humas.tambahsurat');
Route::post('/notadinashumas', [KabagHumasController::class, 'store'])->name('humas.store');
Route::get('/pdf/{id}/humasdspo', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdispohumas');
Route::get('/pdf/{id}/humas', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('viewnotadinashumas');
Route::get('/downloadit/{id}', [DownloadController::class, 'DownloadDisposisi'])->name('downloaddisposisi');


Route::get('/infosuratnotadinasSDI', [KabagSDIController::class, 'show'])->name('SDI.infosuratnotadinas');
Route::get('/disposisiSDI', [KabagSDIController::class, 'showSDI'])->name('SDI.infosurat');
Route::get('/tambahsuratSDI', [KabagSDIController::class, 'tambahsurat'])->name('SDI.tambahsurat');
Route::post('/notadinasSDI', [KabagSDIController::class, 'store'])->name('SDI.store');
Route::get('/pdf/{id}/SDI', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisiSDI');
Route::get('/pdf/{id}/notadinassdi', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('viewnotadinasSDI');
Route::get('/downloadit/{id}', [DownloadController::class, 'DownloadDisposisi'])->name('downloaddisposisi');
Route::get('/infosuratnotadinasSDI', [KabagSDIController::class, 'show'])->name('SDI.infosuratnotadinas');


Route::get('/infosuratnotadinasipsrs', [KabagIPSRSController::class, 'show'])->name('ipsrs.infosuratnotadinas');
Route::get('/disposisiipsrs', [KabagIPSRSController::class, 'showipsrs'])->name('ipsrs.infosurat');
Route::get('/tambahsuratipsrs', [KabagIPSRSController::class, 'tambahsurat'])->name('ipsrs.tambahsurat');
Route::post('/notadinasipsrs', [KabagIPSRSController::class, 'store'])->name('ipsrs.store');
Route::get('/pdf/{id}/ipsrs', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisiipsrs');
Route::get('/pdf/{id}/notadinasipsrs', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('viewnotadinasipsrs');
Route::get('/downloadit/{id}', [DownloadController::class, 'DownloadDisposisi'])->name('downloaddisposisi');


Route::get('/infosuratnotadinasadministrasi', [KabagAdmController::class, 'show'])->name('administrasi.infosuratnotadinas');
Route::get('/disposisiadministrasi', [KabagAdmController::class, 'showadministrasi'])->name('administrasi.infosurat');
Route::get('/tambahsuratadministrasi', [KabagAdmController::class, 'tambahsurat'])->name('administrasi.tambahsurat');
Route::post('/notadinasadministrasi', [KabagAdmController::class, 'store'])->name('administrasi.store');
Route::get('/pdf/{id}/administrasi', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisiadministrasi');
Route::get('/pdf/{id}/notadinasadministrasi', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('viewnotadinasadministrasi');
Route::get('/downloadit/{id}', [DownloadController::class, 'DownloadDisposisi'])->name('downloaddisposisi');



Route::get('/infosuratnotadinasmanajerit', [ManajerController::class, 'showManajerIT'])->name('manajer.timkhususit.notadinas');
Route::get('/infosuratdisposisimanajerit', [ManajerController::class, 'showdispoManajerIT'])->name('manajer.timkhususit.infosurat');
Route::get('/manajerIT/{id}/edit', [ManajerController::class, 'editmanajerit'])->name('manajer.timkhususit.edit');
Route::put('/manajerIT/{id}', [ManajerController::class, 'updatemanajerit'])->name('manajer.timkhususit.update');
Route::get('/manajerunduh/{id}', [ManajerController::class, 'NotaDinasDownload'])->name('notadinas.download');
Route::get('/manajerview/{id}/ManajerIT', [ViewPDFController::class, 'ViewNotadinasPDF'])->name('viewnotadinasmanajerit');



Route::get('/infosuratnotadinasmanajerpelayanan', [ManajerController::class, 'showManajerPelayanan'])->name('manajer.pelayanan.notadinas');
Route::get('/infosuratdisposisimanajerpelayanan', [ManajerController::class, 'showdispoManajerPelayanan'])->name('manajer.pelayanan.infosurat');
Route::get('/manajerPelayanan/{id}/edit', [ManajerController::class, 'editmanajerPelayanan'])->name('manajer.pelayanan.edit');
Route::put('/manajerPelayanan/{id}', [ManajerController::class, 'updatemanajerPelayanan'])->name('manajer.pelayanan.update');
Route::get('/manajerunduh/{id}', [ManajerController::class, 'NotaDinasDownload'])->name('notadinas.download');
Route::get('/manajerview/{id}/ManajerPelayanan', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('notadinaspelayanan');

Route::get('/infosuratnotadinasmanajerkeperawatan', [ManajerController::class, 'showManajerkeperawatan'])->name('manajer.keperawatan.notadinas');
Route::get('/infosuratdisposisimanajerkeperawatan', [ManajerController::class, 'showdispoManajerkeperawatan'])->name('manajer.keperawatan.infosurat');
Route::get('/manajerkeperawatan/{id}/edit', [ManajerController::class, 'editmanajerkeperawatan'])->name('manajer.keperawatan.edit');
Route::put('/manajerkeperawatan/{id}', [ManajerController::class, 'updatemanajerkeperawatan'])->name('manajer.keperawatan.update');
Route::get('/manajerunduh/{id}', [ManajerController::class, 'NotaDinasDownload'])->name('notadinas.download');
Route::get('/manajerview/{id}/ManajerKeperawatan', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('notadinaskeperawatan');

Route::get('/infosuratnotadinasmanajersdi', [ManajerController::class, 'showManajersdi'])->name('manajer.sdi&umum.notadinas');
Route::get('/infosuratdisposisimanajersdi', [ManajerController::class, 'showdispoManajersdi'])->name('manajer.sdi&umum.infosurat');
Route::get('/manajersdi/{id}/edit', [ManajerController::class, 'editmanajersdi'])->name('manajer.sdi&umum.edit');
Route::put('/manajersdi/{id}', [ManajerController::class, 'updatemanajersdi'])->name('manajer.sdi&umum.update');
Route::get('/manajerunduh/{id}', [ManajerController::class, 'NotaDinasDownload'])->name('notadinas.download');
Route::get('/manajerview/{id}/ManajerSDI', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('notadinasmanajersdi');

Route::get('/infosuratnotadinasmanajerksm', [ManajerController::class, 'showManajerksm'])->name('manajer.ksm.notadinas');
Route::get('/infosuratdisposisimanajerksm', [ManajerController::class, 'showdispoManajerksm'])->name('manajer.ksm.infosurat');
Route::get('/manajerksm/{id}/edit', [ManajerController::class, 'editmanajerksm'])->name('manajer.ksm.edit');
Route::put('/manajerksm/{id}', [ManajerController::class, 'updatemanajerksm'])->name('manajer.ksm.update');
Route::get('/manajerunduh/{id}', [ManajerController::class, 'NotaDinasDownload'])->name('notadinas.download');
Route::get('/manajerview/{id}/ManajerKSM', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('notadinasmanajerksm');

Route::get('/infosuratnotadinastimkhususmedis', [ManajerController::class, 'showtimkhususmedis'])->name('manajer.timkhususmedis.notadinas');
Route::get('/infosuratdisposisitimkhususmedis', [ManajerController::class, 'showdispotimkhususmedis'])->name('manajer.timkhususmedis.infosurat');
Route::get('/timkhususmedis/{id}/edit', [ManajerController::class, 'edittimkhususmedis'])->name('manajer.timkhususmedis.edit');
Route::put('/timkhususmedis/{id}', [ManajerController::class, 'updatetimkhususmedis'])->name('manajer.timkhususmedis.update');
Route::get('/manajerunduh/{id}', [ManajerController::class, 'NotaDinasDownload'])->name('notadinas.download');
Route::get('/manajerview/{id}/ManajerMedis', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('notadinastimmedis');


Route::get('/infosuratnotadinasadm', [ManajerController::class, 'showadm'])->name('manajer.adm&keu.notadinas');
Route::get('/infosuratdisposisiadm', [ManajerController::class, 'showdispoadm'])->name('manajer.adm&keu.infosurat');
Route::get('/adm&keu/{id}/edit', [ManajerController::class, 'editadm'])->name('manajer.adm&keu.edit');
Route::put('/adm&keu/{id}', [ManajerController::class, 'updateadm'])->name('manajer.adm&keu.update');
Route::get('/manajerunduh/{id}', [ManajerController::class, 'NotaDinasDownload'])->name('notadinas.download');
Route::get('/manajerview/{id}/ManajerMedis', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('notadinasadm');
Route::get('/manajerview/{id}/ManajerMedis', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('disposisiadm');

Route::get('/infosuratnotadinaskains', [KainsController::class, 'show'])->name('kains.infosuratnotadinas');
Route::get('/disposisikains', [KainsController::class, 'showkains'])->name('kains.infosurat');
Route::get('/tambahsuratkains', [KainsController::class, 'tambahsurat'])->name('kains.tambahsurat');
Route::post('/notadinaskains', [KainsController::class, 'store'])->name('kains.store');
Route::get('/pdf/{id}/kains', [KainsController::class, 'viewpdf'])->name('view.pdf');
Route::get('/pdf/{id}/notadinaskains', [KainsController::class, 'viewpdfnotadinas'])->name('view.pdfnotadinas');
Route::get('/download/{id}', [KainsController::class, 'download'])->name('kains.download');

Route::get('/infosuratnotadinaskeperawatan', [KeperawatanController::class, 'show'])->name('keperawatan.infosuratnotadinas');
Route::get('/disposisikeperawatan', [KeperawatanController::class, 'showkeperawatan'])->name('keperawatan.infosurat');
Route::get('/tambahsuratkeperawatan', [KeperawatanController::class, 'tambahsurat'])->name('keperawatan.tambahsurat');
Route::post('/notadinaskeperawatan', [KeperawatanController::class, 'store'])->name('keperawatan.store');
Route::get('/pdf/{id}/kep', [ViewPDFController::class, 'ViewDisposisiPDF'])->name('viewdisposisikep');
Route::get('/pdf/{id}/notadikep', [ViewPDFController::class, 'ViewNotaDinasPDF'])->name('viewnotadinaskep');
Route::get('/download/{id}', [DownloadController::class, 'NotaDinasDownload'])->name('kepdownload');
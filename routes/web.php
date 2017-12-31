<?php

Route::get('/', 'getController@getIndex');
// index volume 1 jelek, in case pengen di aktifkan lagi....
// Route::get('index2', function () {
//     return view('welcome');
// });

Route::get('profil','getController@getProfile');
Route::get('kursus','getController@getKursus');
Route::get('kontak','getController@getKontak');
Route::get('berita','getController@getBerita');
Route::get('materi','getController@getMateri');
Route::get('materi/api', 'getController@dataMateriApi')->name('materi/api');

Route::get('loginadmin', ['as' => 'login', 'uses' => 'loginController@getlogin']);
Route::post('loginadmin', 'loginController@postLogin');
//dinyalakan pas pertama kali bikin akun doang
// Route::get('register', 'regisController@getRegis');
//  Route::post('register', 'regisController@postRegis');

Route::get('dashboard', 'BackendController@index');
Route::get('home', 'BackendController@redirecthome');
Route::get('pengguna', 'UserController@getPengguna');
Route::post('pengguna', 'UserController@posregisnya');

Route::get('profile', 'BackendController@getProfile');
Route::get('profile/ubahpassword','BackendController@getGantiPassword');
Route::get('profile/ubahnama','BackendController@getGantiNama');
Route::post('profile/ubahpassword','BackendController@postGantiPassword');
Route::post('profile/ubahnama','BackendController@postGantiNama');

Route::get('pengguna/json', 'UserController@dataPenggunaDT')->name('pengguna/json');
Route::get('pengguna/{id}/edit', 'UserController@edit');
Route::get('pengguna/{id}/delete', 'UserController@delete');
Route::put('pengguna/{id}', 'UserController@update');
Route::delete('pengguna/{id}', 'UserController@destroy');

Route::get('aturberita','BackendController@getAturBerita');
Route::get('berita/json', 'BackendController@dataBeritaDT')->name('berita/json');
Route::get('berita/baru','BackendController@getBeritaBaru');
Route::post('berita/baru', 'BackendController@postBeritaBaru');
Route::get('berita/{id}/edit', 'BackendController@editBerita');
Route::put('berita/{id}', 'BackendController@updateBerita');
Route::get('berita/{id}/delete', 'BackendController@deleteBerita');
Route::delete('berita/{id}', 'BackendController@destroyBerita');
Route::get('berita/{slug}','getController@getBeritaSingle');

Route::get('atur-materi','BackendController@getAturMateri');
Route::get('materi/json', 'BackendController@dataMateriDT')->name('materi/json');
Route::get('materi/baru','BackendController@getMateriBaru');
Route::post('materi/baru', 'BackendController@storeMateriBaru');
Route::get('materi/{id}/rename','BackendController@getRenameMateri');
Route::put('materi/{id}', 'BackendController@update_materi');
Route::get('materi/{id}/edit','BackendController@getEditMateri');
Route::delete('materi/{id}', 'BackendController@destroyMateri');

Route::get('atur-jadwal','JadwalController@getAturJadwal');
Route::get('jadwal/json', 'JadwalController@dataJadwalDT')->name('jadwal/json');
Route::get('jadwal','getController@getSemuaJadwal');
Route::get('jadwal/api/{kelas}', 'getController@dataJadwalApi')->name('jadwal/api/{kelas}');
Route::get('jadwal/api', 'getController@dataSemuaJadwalApi')->name('jadwal/api');
Route::get('jadwal/baru','JadwalController@getJadwalBaru');
Route::post('jadwal/baru','JadwalController@import');
Route::get('jadwal/{kelas}/delete', 'JadwalController@deleteJadwal');
Route::get('jadwal/{kelas}', 'getController@getJadwal');


Route::post('kursus', 'getController@getJadwalAndKursus');
Route::get('kelulusan','getController@getSemuaKelulusan');
Route::get('kelulusan/api', 'getController@dataSemuaKelulusanApi')->name('kelulusan/api');

Route::get('atur-kelulusan','BackendController@getAturKelulusan');
Route::get('kelulusan/json', 'BackendController@dataKelulusanDT')->name('kelulusan/json');
Route::get('kelulusan/baru','BackendController@getKelulusanBaru');
Route::post('kelulusan/baru','BackendController@importKelulusan');
Route::get('kelulusan/baru/satuan', 'BackendController@TambahKelulusan');
Route::post('kelulusan/baru/satuan', 'BackendController@postTambahKelulusan');
Route::get('kelulusan/{id}/edit','BackendController@EditKelulusan');
Route::get('kelulusan/{id}/delete','BackendController@destroyKelulusan');
Route::get('kelulusan/{kelas}', 'getController@getKelulusan');

Route::get('file', 'FileController@getUploadFile');

Route::get('logout', 'BackendController@logout');

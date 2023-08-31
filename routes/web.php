<?php

use App\Http\Controllers\Admin\Usermanagement;
use Illuminate\Support\Facades\Route;
use App\Models\ProfileInfo;
use App\Models\User;

Route::get('/', function () {
    // $p = ProfileInfo::get_name();
    return view('welcome');
});
Route::get('/admin', [Usermanagement::class, 'index'])->name('admin.user.manage');
Route::get('/add', [Usermanagement::class, 'create'])->name('admin.user.create');
Route::post('/store', [Usermanagement::class, 'store'])->name('admin.user.store');
Route::post('/delete', [Usermanagement::class, 'destroy'])->name('admin.user.delete');
Route::post('/send', [Usermanagement::class, 'sendMail'])->name('admin.user.sendemail');

// belongTo test
Route::get('/get_profile', [Usermanagement::class, 'getProfile'])->name('admin.user.belongto');

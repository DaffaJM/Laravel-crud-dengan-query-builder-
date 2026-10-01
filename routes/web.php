
<!-- file ini digunakan untuk menentukan rute "jika rute ini diakses maka eventnya apa" kurleb seperti itu 
Contoh struktur folder routes di proyek besar:
routes/web.php (Rute umum untuk pengunjung/publik)
routes/admin.php (Khusus untuk halaman manajemen/dasbor admin)
routes/user.php (Khusus untuk fitur halaman pelanggan/member)
routes/auth.php (Khusus untuk alur login, register, dan reset password)
routes/api_v1.php & routes/api_v2.php (Untuk versi API yang berbeda) -->

<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* jadi fungsi dari slice "/" line 17 digunakan untuk menentukan alamat jadi ada event di alamat tsb.
misal di line 18 di alamat slice kosong dia menampilkan view welcome yang filenya ada di /resources/view/welcome.blade.php */

Route::get('/', function () {     
    return view('welcome');       
});


Route::get('aboutus', function(){
    return view('aboutus');
});
    
    
    
Route::get('blog', function(){
    return view('blog');
});
    
// salah satu jenis routes yang melewati controller
Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/add', [BlogController::class, 'add']);
Route::post('blog/create', [BlogController::class, 'create']);
Route::get('blog/{id}/detail', [BlogController::class, 'show']);
Route::get('blog/{id}/edit', [BlogController::class, 'edit']);
Route::patch('blog/{id}/update', [BlogController::class, 'update']);
Route::delete('blog/{id}/delete', [BlogController::class, 'destroy']);
Route::get('blog/{id}/restore', [BlogController::class, 'restore']);



//salah satu jenis routes juga 
// Route::get('blog/{id}', function (Request $request){
//     return 'ini adalah blog '.$request->id;
// });


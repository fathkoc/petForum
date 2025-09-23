<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\PreventRapidRequests;

Route::put('/users/{user}', [IndexController::class, 'updateUser'])
    ->name('users.update');


Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/', [IndexController::class, 'index']);
Route::get('/soru-sor', [IndexController::class, 'showTopic'])->name('topic.create');
Route::post('/soru-sor', [IndexController::class, 'storeTopic'])
    ->middleware(PreventRapidRequests::class)
    ->name('topic.store');

Route::get('/soru/{id}', action: [IndexController::class, 'showTopicDetail'])->name('topic.detail');

Route::post('/soru/{id}/cevap', [IndexController::class, 'storeComment'])
    ->middleware(PreventRapidRequests::class)
    ->name('answer.store');

Route::put('/topics/{topic}/comments/{comment}', [IndexController::class, 'updateComment'])
    ->middleware(PreventRapidRequests::class)
    ->name('comments.update');

    Route::post('/comments/{comment}/delete', [IndexController::class, 'softDeleteComment'])
    ->middleware(PreventRapidRequests::class)
    ->name('comment.delete');


Route::get('/yuva-arayanlar', [IndexController::class, 'adaption'])
    ->name('adoption.index');


Route::post('/topics/{id}/like-toggle', [IndexController::class,'toggle'])
    ->name('topics.like.toggle');

Route::post('/comments/{comment}/like-toggle', [IndexController::class,'toggleLikeComment'])
    ->name('comment.like.toggle');

Route::post('/topics/{id}/report', [IndexController::class,'storeReport'])
    ->middleware(PreventRapidRequests::class)
    ->name('topics.report.store');

Route::post('/comments/{comment}/report', [IndexController::class,'reportComment'])
    ->middleware(PreventRapidRequests::class)
    ->name('comment.report.store');

Route::put('/topics/{topic}', [IndexController::class, 'updateTopic'])
    ->middleware(PreventRapidRequests::class)
    ->name('topic.update');
    
    Route::get('/topics/{topic}', [IndexController::class, 'editTopic'])->name('topic.edit');

 Route::post('/account/avatar', [IndexController::class, 'updateAvatar'])
        ->name('account.avatar.update');


    Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); 
        })->name('logout');


        Route::get('/sso-make-url', function (Illuminate\Http\Request $r) {
            $email = strtolower($r->query('email', 'fatih@example.com'));
            $name = $r->query('name', 'Fatih');
            $lastName = $r->query('lastName', 'Yilmaz');
            $timestamp = $r->query('timestamp', time());
            $secret = env('EXTERNAL_SSO_SECRET', 'supersecretkey');

            $token = hash('sha256', $email . $timestamp . $secret);

            $q = http_build_query([
                'email' => $email,
                'name' => $name,
                'lastName' => $lastName,
                'timestamp' => $timestamp,
                'token' => $token,
            ]);

            return url('/login') . '?' . $q;
        });

    
    Route::get('/profile/myprofile', [IndexController::class, 'me'])
            ->name('account.profile');

    Route::patch('/profile/topics/{topic}/sil', [IndexController::class, 'softDelete'])
    ->middleware(PreventRapidRequests::class)
    ->name('account.topics.softDelete');
    
    Route::get('/account/topics', [IndexController::class, 'myTopic'])
        ->name('account.topics');


        Route::get('/ticimax/uyeler', [App\Http\Controllers\TicimaxController::class, 'getUyeler']);

Route::prefix('admin')->group(function () {
   
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');

    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');

    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('/users', action: [AdminController::class, 'getUsers'])->name('admin.users');

    Route::get('/topics', [AdminController::class, 'getTopics'])->name('admin.topics');
    
    Route::delete('/admin/topics/{id}', [AdminController::class, 'destroy'])->name('admin.topics.destroy');
    
    Route::get('/topics/{id}', [AdminController::class, 'show'])
    ->name('admin.topics.show');

    Route::delete('/admin/comments/{id}', [AdminController::class, 'destroyComment'])
    ->name('admin.comments.destroy');

    Route::get('/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');  

    Route::get('/reportsComment', [AdminController::class, 'reportComment'])->name('admin.reports.comments');
    Route::post('/comments/{comment}/delete', [AdminController::class, 'softDeleteComment'])
        ->name('comment.delete');

    Route::get('/reports', [AdminController::class, 'report'])->name('admin.reports.index');
    Route::get('/reports/{id}', [AdminController::class, 'reportShow'])->name('admin.reports.show');

});



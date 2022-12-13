<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\UsersController;
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

Route::middleware('auth')->get('/', function () {
    return inertia('Dashboard');
});

Route::middleware('auth')->get('/dashboard', function () {
    return inertia('Dashboard');
});

Route::middleware('auth')->get('/reports', function () {
    return inertia('Report');
});

Route::middleware('auth')->get('/tables', function () {
    return inertia('Tables');
});

Route::middleware('auth')->get('/charts', function () {
    return inertia('Charts');
});

Route::middleware('auth')->get('/users', function () {
    return Inertia::render('Users', [
        'users' => \App\Models\User::all()->map(function ($user) {
            return [
                'id' => $user->user_id,
                'customer_id' => $user->id,
                'first_name' => $user->name,
                'last_name' => $user->api_key,
                'email' => $user->email,
                'phone' => $user->phone,
                'active' => $user->active,
                'create_date' => $user->create_at,
                'last_update' => $user->updated_at,
                'edit_url' => url('users.edit', $user),
            ];
        }),
        'create_url' => url('users.create'),
    ]);
});

Route::middleware('auth')->get('user/{contact}/edit', [UsersController::class, 'edit_customer'])->name('contacts.edit');
Route::middleware('auth')->get('messages', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('names', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('contacts', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('groups', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('invoices', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('week', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('month', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('year', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('last', [UsersController::class, 'address'])->name('contacts.edit');
Route::middleware('auth')->get('integretions', [UsersController::class, 'address'])->name('contacts.edit');

Route::middleware('auth')->post('/logouts', function () {
    dd('Logout page visited');
});

Route::middleware('auth')->get('/web', function () {
    return Inertia::render('Home',[
        'name' => "Albogast Dionis",
        'phone' => '0744158016',
        'email' => 'albogast@darsms.co.tz',
        'companies' => [
            'Laravel', 'Vue', 'Django', 'Postgres', 'Boostrap', 'MySQL'
        ]
    ]);
});


Route::middleware('auth')->get('/forms', function () {
    return Inertia::render('Forms',[
        'name' => "Albogast Dionis",
        'phone' => '0744158016',
        'email' => 'albogast@darsms.co.tz',
        'companies' => [
            'Laravel', 'Vue', 'Django', 'Postgres', 'Boostrap', 'MySQL'
        ]
    ]);
});
Auth::routes();

Route::middleware('auth')->get('/home', function () {
    return inertia('Dashboard');
});

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    public function users()
    {
        return Inertia::render('Users/Index', [
            'users' => User::all()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'edit_url' => URL::route('users.edit', $user),
                ];
            }),
            'create_url' => URL::route('users.create'),
        ]);
    }

    public function index()
    {
        return Inertia::render('Users/Index', [
            'filters' => Request::all('search', 'trashed'),
            'Users' => Auth::user()->account->Users()
                ->orderBy('name')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($User) => [
                    'id' => $User->id,
                    'name' => $User->name,
                    'phone' => $User->phone,
                    'city' => $User->city,
                    'deleted_at' => $User->deleted_at,
                ]),
        ]);
    }

    public function address()
    {
        return Inertia::render('Messages', [
            'users' => \App\Models\User::whereNotNull('district')
                ->orderBy('address')
                ->paginate(12)->withQueryString()
                ->through(fn ($User) => [
                    'id' => $User->address_id,
                    'address' => $User->address,
                    'district' => $User->district,
                    'city' =>  !empty($User->city) > 0 ? $User->city->city : 'Kigoma',
                    'country' =>  $User->city_id > 0 && !empty($User->city->country) ? $User->city->country->country : 'Tanzania',
                    'deleted_at' => $User->deleted_at,
                    'edit_url' => url('users.edit', $User),
                ]),
            'name' => 'Albogast',
            'create_url' => url('users.create'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store()
    {
        Auth::user()->account->Users()->create(
            Request::validate([
                'name' => ['required', 'max:100'],
                'email' => ['nullable', 'max:50', 'email'],
                'phone' => ['nullable', 'max:50'],
                'address' => ['nullable', 'max:150'],
                'city' => ['nullable', 'max:50'],
                'region' => ['nullable', 'max:50'],
                'country' => ['nullable', 'max:2'],
                'postal_code' => ['nullable', 'max:25'],
            ])
        );

        return Redirect::route('Users')->with('success', 'User created.');
    }

    public function edit(User $User)
    {

        return Inertia::render('Users/Edit', [
            'user' => [
                'id' => $User->id,
                'name' => $User->name,
                'email' => $User->email,
                'phone' => $User->phone,
                'address' => $User->address,
                'city' => $User->city,
                'region' => $User->region,
                'country' => $User->country,
                'postal_code' => $User->postal_code,
                'deleted_at' => $User->deleted_at,
                'contacts' => $User->contacts()->orderByName()->get()->map->only('id', 'name', 'city', 'phone'),
            ],
        ]);
    }

    public function edit_customer(User $customer)
    {
        $id = request()->segment(2);
        $customer = User::where('customer_id', $id)->first();
        $next = User::where('customer_id', '>', $id)->first();
        return Inertia::render('Edit', [
            'user' => [
                'store_id' => $customer->store,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'email' => $customer->email,
                'active' => $customer->active,
                'create_date' => date("d M, Y", strtotime($customer->create_date)),
                'last_update' => date("d M, Y", strtotime($customer->last_update)),
                'next' => $next,
                'edit_url' => url('users.edit', $customer),
            ],
        ]);
    }
    public function update(User $User)
    {
        $User->update(
            Request::validate([
                'name' => ['required', 'max:100'],
                'email' => ['nullable', 'max:50', 'email'],
                'phone' => ['nullable', 'max:50'],
                'address' => ['nullable', 'max:150'],
                'city' => ['nullable', 'max:50'],
                'region' => ['nullable', 'max:50'],
                'country' => ['nullable', 'max:2'],
                'postal_code' => ['nullable', 'max:25'],
            ])
        );

        return Redirect::back()->with('success', 'User updated.');
    }

    public function destroy(User $User)
    {
        $User->delete();

        return Redirect::back()->with('success', 'User deleted.');
    }

    public function restore(User $User)
    {
        $User->restore();

        return Redirect::back()->with('success', 'User restored.');
    }
}

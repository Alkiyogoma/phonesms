<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ContactsController extends Controller
{
    public function index()
    {
        return Inertia::render('Contacts/Index', [
            'filters' => Request::all('search', 'trashed'),
            'contacts' => Auth::User()->clients()
                ->filter(Request::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($client) => [
                    'id' => $client->id,
                    'name' => $client->name,
                    'phone' => $client->phone,
                    'city' => $client->address,
                    'email' => $client->email,
                    'organization' => $client->user ? $client->user->only('name') : null,
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Contacts/Create', [
            'organizations' => Auth::User()->groups()
                ->orderBy('name', 'ASC')
                ->get()
                ->map
                ->only('id', 'name'),
        ]);
    }

    public function store()
    {
        Auth::User()->clients()->create(
            Request::validate([
                'name' => ['required', 'max:50'],
                'phone' => ['required', 'max:50'],
                'user_id' => ['nullable', Rule::exists('users', 'id')->where(function ($query) {
                    $query->where('user_id', Auth::User()->id);
                })],
                'email' => ['nullable', 'max:50', 'email'],
                'address' => ['nullable', 'max:150'],
                'jod' => ['nullable', 'max:50'],
            ])
        );

        return Redirect::route('clients')->with('success', 'client created.');
    }

    public function edit(Clients $client)
    {
        return Inertia::render('Contacts/Edit', [
            'contact' => [
                'id' => $client->id,
                'name' => $client->name,
                'email' => $client->email,
                'phone' => $client->phone,
                'address' => $client->address,
                'jod' => $client->jod,
                'deleted_at' => $client->created_at,
            ],
            'organizations' => Auth::User()->groups()
                ->get()
                ->map
                ->only('id', 'name'),
        ]);
    }

    public function update(Clients $client)
    {
        $client->update(
            Request::validate([
                'name' => ['required', 'max:50'],
                'phone' => ['required', 'max:50'],
                'user_id' => [
                    'required',
                    Rule::exists('users', 'id')->where(fn ($query) => $query->where('id', Auth::User()->id)),
                ],
                'email' => ['nullable', 'max:50', 'email'],
                'address' => ['nullable', 'max:150'],
            ])
        );

        return Redirect::back()->with('success', 'client updated.');
    }

    public function destroy(Clients $client)
    {
        $client->delete();

        return Redirect::back()->with('success', 'client deleted.');
    }

    public function restore(Clients $client)
    {
        $client->restore();

        return Redirect::back()->with('success', 'client restored.');
    }
}

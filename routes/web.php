<?php

use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/login',[LoginController::class,'create'])->name('login.create');
Route::post('/login/store',[LoginController::class,'store'])->name('login.store');
Route::post('/logout',[LoginController::class,'destroy'])->middleware(['auth']);

Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {
        return Inertia::render('Welcome',[
            'name' => 'Myat Thu',
            'frameworks' => ['Inertia','vue','framework','for','laravel']
        ]);
    });

    Route::get('/users',function (){
        return Inertia::render('Users/Index',[
            'users' => User::query()
                ->latest('id')
                ->when(Request::input("search"),function ($query,$search){
                    $query->where('name','like',"%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(function ($user){
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'can' => [
                            'edit' => Auth::user()->can('update',$user),
                        ]
                    ];

                }),
            'filters' => Request::only(["search"]),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class),

            ]
        ]);
    });

    Route::get('/users/create',function (){
        return Inertia::render('Users/Create');
    })->can('create','App\Models\User');

    Route::post('/users',function (){

        sleep(3);
        // Validate
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        // Create
        User::query()->create($attributes);

        // Redirect
        return redirect('/users');
    });

    Route::get('/settings',function (){
        return Inertia::render('Settings');
    });

});


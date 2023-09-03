<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Helpers\AccountHelper;
use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
         
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $account= $user->accounts();

        event(new Registered($user));
         
        Auth::login($user);
        $this->createUserAccounts($user->id,'EUR');
        $this->createUserAccounts($user->id,'USD');
        $this->createUserAccounts($user->id,'JOD');
       
        return redirect(RouteServiceProvider::HOME);
    }









    

function createUserAccounts($user_id,$type){
    $curencies=[
        "EUR" => 978,
        "USD" => 840,
        "JOD" => 400,
    ];
    
    $uniqueCode = $this->generateUniqueCode();
     
    Account::create( [
        'number' =>  $uniqueCode.'-'. $curencies[$type],
        'currency' =>  ''.$curencies[$type],
        'balance' =>  0,
        'user_id' => $user_id,
    ]);
}

function generateUniqueCode()
{
    // Generate a random 5-digit number
    $randomNumber = mt_rand(10000, 99999);

    // Generate a unique code using the random number and some randomness
    $uniqueCode = $randomNumber  ;

    return $uniqueCode;
}
}

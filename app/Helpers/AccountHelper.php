<?php

use App\Models\Account;
 

$curencies=[
    "EUR" => 978,
    "USD" => 840,
    "JOD" => 400,
];

function createUserAccounts($user_id,$type){
    $uniqueCode = generateUniqueCode();
    $data = [
        'number' =>  $uniqueCode.'-'.'430',
        'currency' =>  $curencies=[$type],
        'balance' =>  0,
        'user_id' => $user_id,
    ];
    Account::created($data);
}

function generateUniqueCode()
{
    // Generate a random 5-digit number
    $randomNumber = mt_rand(10000, 99999);

    // Generate a unique code using the random number and some randomness
    $uniqueCode = $randomNumber . \Str::random(5);

    return $uniqueCode;
}

// Usage

 





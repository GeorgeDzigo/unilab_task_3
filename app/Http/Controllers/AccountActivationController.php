<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountActivationController extends Controller
{
    public function show() {
        return view("account.activation");
    }

    public function update(User $user) {
        dd($user);
    }

}

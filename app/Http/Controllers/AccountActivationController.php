<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AccountActivationController extends Controller
{
    public function show()
    {
        if(auth()->user()->status != 1)
        {
            $status = "Disable";
            $action = "enable";
        }
        
        else
        {
            $status = "Enable";
            $action = "disable";
        }


        return view("account.activation", [
            "status" => $status,
            "action" => $action,
        ]);
    }

    public function enable()
    {
        $user = User::find(auth()->id());
        $user->status = 1;
        $user->save();
        return redirect("/");
    }

    public function disable( )
    {
        $user = User::find(auth()->id());
        $user->status = 0;
        $user->save();
        return redirect("/");
    }

}

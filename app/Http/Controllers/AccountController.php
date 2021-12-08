<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function checkUser(Request $request)
    {
        $account = Account::where('login', '=', $request->login)->first();
        if($account != null && $account->password == $request->password) {
            return response()->json(['result' => 'Ok'],200);
        }
        return response()->json(['result' => 'Not authorized'],403);
    }
}

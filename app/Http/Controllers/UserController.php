<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();              //users is table name

        return response()->json(
            [
            'message' => count($users).' User found',
            'data' => $users,
            'status' => true
        ] , 200
    );
    }
}

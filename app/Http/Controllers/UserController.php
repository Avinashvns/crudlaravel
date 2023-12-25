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

    // Create a get api of single user

    public function show($id){
        $Singleuser = User::find($id);

        if($Singleuser != null){
            return response()->json(
                [
                'message' =>' User found',
                'data' => $Singleuser,
                'status' => true
            ],200);

        } else{
            return response()-> json ([
                'message' => ' User not found',
                'data' => [],
                'status' => true
            ],200);
        }
    }
}

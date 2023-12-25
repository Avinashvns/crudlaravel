<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Validator;

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

    // Create Post Api 
    public function postuser(Request $request){
        $validator= Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator -> fails()){
            return response()-> json ([
                'message' => ' Please fix the errors',
                'errors' => $validator ->errors(),
                'status' => false
            ],200);  
        }
        
        $user = new User;
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> password = $request->password;
        $user -> save();

        return response()-> json ([
            'message' => ' User added successfully',
            'data'=> $user,
            'status' => true
        ],200); 

    }
}

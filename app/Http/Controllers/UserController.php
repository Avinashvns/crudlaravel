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

        // if Data is available then Validate data
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

    // Create Update Api
    public function update(Request $request , $id){
        $user =User::find($id);
        if($user == null){
            return response()-> json ([
                'message' => ' User not Found',
                'status' => false
            ],200); 
        }

        // if Data is available then Validate data

        $validator= Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if($validator -> fails()){
            return response()-> json ([
                'message' => ' Please fix the errors',
                'errors' => $validator ->errors(),
                'status' => false
            ],200);  
        }

        // Record Update Code here
        $user ->name = $request->name ;
        $user ->email = $request->email;
        $user ->save();

        // return json response
        return response()-> json ([
            'message' => ' User Updated Successfully',
            'data'=> $user,
            'status' => false
        ],200);  
    }
    // delet Api
    public function delete($id){
        $user = User::find($id);

        if($user == null){
            return response()-> json ([
                'message' => ' User not Found',
                'status' => false
            ],200); 
        }

        // Delete method
        $user -> delete();

        // return json delete response
        return response()-> json ([
            'message' => ' User Deleted Successfully',
            'status' => false
        ],200); 
    }
}

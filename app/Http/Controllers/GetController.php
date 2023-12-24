<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetController extends Controller
{
    //
    public function index(){
        $array=[
            [
                'name' => 'Avinash Singh',
                'email' => 'Avi@gmail.com'
            ],
            [
                'name' => 'Anu Singh',
                'email' => 'Anu@gmail.com'
            ]
        ];

        return response()->json([
            'message' => '2User found',
            'data' => $array,
            'status' => true
        ], 200);   
    }
}

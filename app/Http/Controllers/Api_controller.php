<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Api_controller extends Controller
{
    public function index()
    {
        $data = \DB::table('members')->get();
        return response()->json([
            // 'success'=>true,
            'data'=>$data,
            'count'=>count($data),
        ]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(){
        $members = Member::all();
        $count = $members->count();
        
        return response()->json([
            'status'    => 'Success',
            'message'   => 'Get All Data Member Successfully',
            'data'      => $members,
            'count'     => $count
        ], 201);
    }

    public function show($uuid){
        $member = Member::where('uuid', $uuid)->first();
        if(!$member){
            return response()->json([
                'status'    => 'Failed',
                'message'   => 'User Does Not Exist!',
            ], 404);
        }

        $count = $member->count();
        
        return response()->json([
            'status'    => 'Success',
            'message'   => 'Get All Data Member Successfully',
            'data'      => $member,
            'count'     => $count
        ], 201);
    }
}

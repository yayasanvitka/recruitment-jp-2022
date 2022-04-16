<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ApiController extends Controller
{
    public function index()
    {
        $member = Member::with('district.city.province')->orderBy('created_at', 'DESC')->get();
        $response = [
            'message' => 'Data Member',
            'data' => $member,
        ];
        return response()->json($response, HttpFoundationResponse::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ApiController extends Controller
{
    public function index()
    {
        $members = Member::with('district.city.province')->orderBy('created_at', 'DESC')->get();
        $count = $members->count();

        $response = [
            'status'    => 'Success',
            'message' => 'Get Data Member Successfully',
            'data' => $members,
            'count'     => $count
        ];
        return response()->json($response, HttpFoundationResponse::HTTP_OK);
    }
}

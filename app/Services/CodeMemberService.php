<?php
namespace App\Services;
use App\Models\Member;

class CodeMemberService
{
    public static  function handle()
    {
        $pattern = "MBR";
        $code = Member::latest()->first();
        $string = preg_replace("/[^0-9\.]/", '', $code->code);

        return $pattern . '-' . sprintf('%03d', $string + 1);
    }
}

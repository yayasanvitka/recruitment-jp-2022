<?php

namespace App\Services;
use App\Models\Member;
// Generate Code Member

class CodeMemberService
{


    public function generateCode() {

        $code = Member::latest()->first();
        
        if($code == null){
            $code = 'AG00001';
        }else{
            $code = $code->code;
            $code = substr($code, 2);
            $code = (int)$code;
            $code = $code + 1;
            $code = 'AG'.str_pad($code, 5, '0', STR_PAD_LEFT);
        }
        return $code;
        

    }
}
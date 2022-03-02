<?php

namespace App\Models;

use App\Models\City;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Member extends Model
{
    use CrudTrait;

    protected $table = 'members';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = ['uuid'];
    // protected $fillable = ['id'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

        static::creating(function (Member $model) {
            $model->uuid = (string) Str::orderedUuid()->toString();
        });
    }

    public static function getCode(){
        return mt_rand(10000000, 99999999);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    
    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{

    use SoftDeletes;
    protected $guarded = ['_token'];

    public function province()
    {
        return $this->belongsto(Province::class,'city_id');
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function subgroup()
    {
        return $this->belongsTo(SubGroup::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubGroup extends Model
{
    use SoftDeletes;
    protected $fillable=['name','group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}

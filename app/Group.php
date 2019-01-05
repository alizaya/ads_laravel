<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $fillable=['name'];
    public  function subgroups(){
        return $this->hasMany(SubGroup::class);
    }
}

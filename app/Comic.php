<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $table = "comics";
    protected $fillable = ['field1', 'foo', 'bar'];
}

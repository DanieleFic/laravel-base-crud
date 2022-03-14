<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $table = "comics";

    protected $guarded = [];
    //nel guarded ci va il valore del form che non deve essere aggiunto 

    //protect che usiamo se usciamo il metodo fill-> sullo store

    //protected $fillable = ['title', 'description', 'thumb','price','series','sale_date','type'];
}

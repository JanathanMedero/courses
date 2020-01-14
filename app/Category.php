<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    $timestamps = false;

    protected $guarded = [];

    public function course()
    {
    	$this->belongsTo(Course::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
    	'title','description','price','category_id','image',
    ];
    public function comments()
    {
        return $this->hasMany(comments::class);
    }
}

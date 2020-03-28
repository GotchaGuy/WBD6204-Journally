<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['title'];
    public $timestamps = false;

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

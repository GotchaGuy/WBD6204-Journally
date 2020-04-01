<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['content', 'date', 'user_id', 'status_id'];

    protected $appends = ['type'];

    protected $with = ['status'];

    public function getTypeAttribute()
    {
        return $this->status->title;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}

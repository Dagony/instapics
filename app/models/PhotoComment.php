<?php

class PhotoComment extends Eloquent
{
    public $timestamps = true;
    public $table = 'photo_comments';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function photo()
    {
        return $this->belongsTo('Photo');
    }
}
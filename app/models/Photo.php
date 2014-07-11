<?php
class Photo extends Eloquent
{
    public $timestamps = true;
    protected $fillable = array(
        'location'
    );

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function photocomments()
    {
        return $this->hasMany('PhotoComment');
    }
}
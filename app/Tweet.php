<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    /**
     * @var string
     */
    protected $table = 'tweets';

    protected $fillable = ['description','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @var array
     */
    protected $guarded = [];
}

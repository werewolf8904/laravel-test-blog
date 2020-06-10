<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const UPDATED_AT = null;
    protected $fillable = ['author', 'content'];

    public function belong_to()
    {
        return $this->morphTo();
    }

}

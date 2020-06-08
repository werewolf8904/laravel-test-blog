<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['author','content'];

    const UPDATED_AT = null;


    public function belong_to()
    {
        return $this->morphTo();
    }

}

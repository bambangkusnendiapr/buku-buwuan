<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Master\Kategori');
    }
}

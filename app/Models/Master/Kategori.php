<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'master_kategori';

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
}

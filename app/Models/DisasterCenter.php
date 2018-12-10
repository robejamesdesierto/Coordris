<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisasterCenter extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'code';
    }
}

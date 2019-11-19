<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $guarded = [
        'created_at', 'updated_at', 'point_truck', 'point_trailer'
    ];
}

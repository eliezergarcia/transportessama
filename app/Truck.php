<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use GeneralFunctions;
    
    protected $guarded = [
        'id_truck', 'created_at', 'updated_at'
    ];

    public function type()
    {
      return $this->belongsTo(Type::class);
    }

    public function brand()
    {
      return $this->belongsTo(Brand::class);
    }

    public function service()
    {
      return $this->belongsTo(Service::class);
    }

    public function owner()
    {
      return $this->belongsTo(Owner::class);
    }

    public function peso()
    {
    	return "Hola";
    }

}

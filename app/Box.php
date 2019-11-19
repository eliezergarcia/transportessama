<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use GeneralFunctions;
    
    protected $guarded = [
        'id_box', 'created_at', 'updated_at'
    ];

    public function type()
    {
      return $this->belongsTo(Type::class);
    }

    public function brand()
    {
      return $this->belongsTo(Brand::class);
    }

    public function obtenerYear() 
    {
        if($this->year == 0){
            return "PTE";
        }else{
            return $this->year;
        }   
    }
}

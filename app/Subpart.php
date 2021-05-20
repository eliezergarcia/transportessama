<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpart extends Model
{
    use GeneralFunctions;

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function statusMileage()
    {
        if($this->truck_id){
            $truck = Truck::findOrFail($this->truck_id);
        }else{
            $truck = Box::findOrFail($this->box_id);
        }

        if($truck->type === 'Foráneo' || $truck->type === 'Foránea'){
            $limit =  2000;
        }else{
            $limit = 500;
        }

        $diffMileage = $this->expiration_mileage - $this->instalation_mileage;

        if($diffMileage < $limit){
            return 1;
        }

        if($diffMileage >= $limit){
            return 2;
        }

        if($diffMileage === 0){
            return 3;
        }

        return 0;
    }
}

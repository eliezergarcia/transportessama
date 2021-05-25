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

        $diffActualMileage = $truck->actual_mileage - $this->instalation_mileage;
        $diffMileageSubpart =  $this->expiration_mileage - $diffActualMileage;

        if($diffMileageSubpart > $limit){
            return 1;
        }

        if($diffMileageSubpart <= $limit && $diffMileageSubpart > 0){
            return 2;
        }

        if($diffMileageSubpart <= 0){
            return 3;
        }

        return 0;
    }

    public function updatePart(){

        $part = Part::findOrFail($this->part_id);

        $subparts = Subpart::where('part_id', $this->part_id)->where('inactive_at', null)->where('status', 3)->count();
        if($subparts > 0){
            $part->status = 3;
            $part->save();
            return;
        }

        $subparts = Subpart::where('part_id', $this->part_id)->where('inactive_at', null)->where('status', 2)->count();
        if($subparts > 0){
            $part->status = 2;
            $part->save();
            return;
        }

        $subparts = Subpart::where('part_id', $this->part_id)->where('inactive_at', null)->where('status', 1)->count();

        if($subparts > 0){
            $part->status = 1;
            $part->save();
            return;
        }

        $part->status = 0;
        $part->save();
    }

    public function updateTruck(){

        if($this->truck_id){
            $truck = Truck::findOrFail($this->truck_id);
            $parts = Part::where('truck_id', $this->truck_id)->where('inactive_at', null)->where('status', 3)->count();
            if($parts > 0){
                $truck->status_parts = 3;
                $truck->save();
                return;
            }
    
            $parts = Part::where('truck_id', $this->truck_id)->where('inactive_at', null)->where('status', 2)->count();
            if($parts > 0){
                $truck->status_parts = 2;
                $truck->save();
                return;
            }
    
            $parts = Part::where('truck_id', $this->truck_id)->where('inactive_at', null)->where('status', 1)->count();
    
            if($parts > 0){
                $truck->status_parts = 1;
                $truck->save();
                return;
            }
    
            $truck->status_parts = 0;
            $truck->save();
        }else{
            $box = Box::findOrFail($this->box_id);
            $parts = Part::where('box_id', $this->box_id)->where('inactive_at', null)->where('status', 3)->count();
            if($parts > 0){
                $box->status_parts = 3;
                $box->save();
                return;
            }
    
            $parts = Part::where('box_id', $this->box_id)->where('inactive_at', null)->where('status', 2)->count();
            if($parts > 0){
                $box->status_parts = 2;
                $box->save();
                return;
            }
    
            $parts = Part::where('box_id', $this->box_id)->where('inactive_at', null)->where('status', 1)->count();
    
            if($parts > 0){
                $box->status_parts = 1;
                $box->save();
                return;
            }
    
            $box->status_parts = 0;
            $box->save();
        }

    }
}

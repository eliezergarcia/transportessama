<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use GeneralFunctions;

    protected $guarded = [
        'box_id', 'created_at', 'updated_at'
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

    public function porcentaje()
    {
        $mantenimiento = Maintenance::where('box_id', $this->id)->orderBy('id', 'desc')->first();

        if($mantenimiento){
            $points = DB::table('assigned_points')->where('maintenance_id', $mantenimiento->id)->get();
            $total = 100/$points->count();
            $corrects = $points->pluck('value')->intersect('1')->count();
            /*$corrects = $corrects->pluck('1');*/
            $percent = round($corrects * $total);

            return $percent;
        }else{
            return "";
        }
    }

    public function movimientos()
    {
        $movement = Movement::where('box_id', $this->id)->orderBy('id', 'desc')->first();

        if ($movement) {
            if ($movement->movements % 2 == 0) {
                $movimientos = $movement->movements / 2;
            }else{
                $movimientos = ($movement->movements - 1) / 2;
            }
        }else{
            $movimientos = 0;
        }


        return $movimientos;
    }

    public function proximaInspeccion()
    {

    }


    public function getLatestMileageInspection()
    {
        return Carbon::parse($this->date_mileage)->format('d-m-Y');
    }

    public function checkDecimal($number){
        if ($number % 1 == 0) {
            return round($number);
        } else {
            return $number;
        }
    }

    public function statusMileage()
    {
        $diffMileage = $this->actual_mileage - $this->latest_mileage;

        if($diffMileage < 13000){
            return 1;
        }

        if($diffMileage >= 13000){
            return 2;
        }

        if($diffMileage >= 15000){
            return 3;
        }

        return 0;
    }

    public function updateSubparts(){

        $subparts = Subpart::where('box_id', $this->id)->where('inactive_at', null)->get();

        foreach ($subparts as $subpart) {
            $subpart->status = $subpart->statusMileage();
            $subpart->save();
            $subpart->updatePart();
            $subpart->updateTruck();
        }
    }

    public function yellowPartsExcel(){
        $parts = Part::where('box_id', $this->id)->where('status', 2)->where('inactive_at', null)->get();

        return $parts;
    }

    public function redPartsExcel(){
        $parts = Part::where('box_id', $this->id)->where('status', 3)->where('inactive_at', null)->get();

        return $parts;
    }
}

<?php

namespace App\Exports;

use App\Truck;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TrucksExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('maintenance.trucks.exports', [
            'trucks' => Truck::where('status_parts', '!=', null)
                            ->where('status_parts', '!=', 0)
                            ->where('status_parts', '!=', 1)
                            ->where('inactive_at', null)
                            ->get()
        ]);
    }
}

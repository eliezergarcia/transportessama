<?php

namespace App\Exports;

use App\Box;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BoxExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('maintenance.boxes.exports', [
            'boxes' => Box::where('status_parts', '!=', null)
                            ->where('status_parts', '!=', 0)
                            ->where('status_parts', '!=', 1)
                            ->where('inactive_at', null)
                            ->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Inspection;
use App\InspectionPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request->points_inspection[0]);*/
         DB::beginTransaction();

        $inspection = (new Inspection)->fill($request->all());
        $inspection->save();

        $points = InspectionPoint::where('inactive_at', null)
                                ->where('type', 'TRUCK & TRAILER')->get();

        /*dd($points[0]['id']);*/

        for ($i=0; $i < count($points); $i++) 
        { 
            DB::table('assigned_points')->insert([
                'inspection_id' => $inspection->id, 
                'point_id' => $points[$i]['id'], 
                'value' => $request->points_inspection[$i]
            ]);
        }

        /*DB::table('assigned_points')->insert([
            ['inspection_id' => $user_id, 'point_id' => $event->id],
        ]);


    /*    if($request->has('points_inspection'))
        {
            for ($i=0; $i < count($request->input('concepts')); $i++) {
                $concepts = new ConceptsOperation();
                $idconcept = $request->input('concepts')[$i];
                $rateconcept = $request->input('rates')[$i];
                $iva = $request->input('iva')[$i];

                $ivaconcept = $rateconcept * $iva;
                $qtyconcept = $request->input('qty')[$i];
                $foreignconcept = ($rateconcept + $ivaconcept) * $qtyconcept;

                $concepts->operation_id = $request->input('operation_id');
                $concepts->debit_note_id = $debitnote->id;
                $concepts->concept_id = $idconcept;
                $concepts->curr = $request->input('curr')[$i];
                $concepts->rate = $rateconcept;
                $concepts->iva = $ivaconcept;
                $concepts->qty = $qtyconcept;
                $concepts->foreign = $foreignconcept;
                $concepts->save();
            }
        }*/


        if($inspection){
            DB::commit();
            return back()->with('success', 'La inspección se ha registrado correctamente.');
        }else{
            DB::rollBack();
            return back()->with('error', 'Ocurrió un problema al registrar la inspección.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Subpart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubpartController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $subpart = (new Subpart)->fill($request->all());
        $subpart->status = $subpart->statusMileage();
        $subpart->save();

        if($subpart){
            DB::commit();
            return back()->with('success', 'La subparte se agregó al tractor correctamente.');
        }else{
            DB::rollBack();
            return back()->with('error', 'Ocurrió un problema al registrar el tractor.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subpart  $subpart
     * @return \Illuminate\Http\Response
     */
    public function show(Subpart $subpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subpart  $subpart
     * @return \Illuminate\Http\Response
     */
    public function edit(Subpart $subpart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subpart  $subpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $subpart = Subpart::findOrFail($id);
        $subpart->update($request->all());
        $subpart->status = $subpart->statusMileage();
        $subpart->save();

        if($subpart){
            DB::commit();
            return back()->with('success', 'La información de la subparte se ha guardado correctamente.');
        }else{
            DB::rollBack();
            return back()->with('error', 'Ocurrió un problema al guardar la información de la subparte.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subpart  $subpart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subpart $subpart)
    {
        //
    }

    public function getSubparts($id)
    {
        $subparts = Subpart::where('part_id', $id)->where('inactive_at', null)->get();
        return $subparts;
    }

    public function deactivate($id)
    {
        DB::beginTransaction();

        $subpart = Subpart::findOrFail($id);
        $subpart->deactivate();

        if($subpart){
            DB::commit();
            return back()->with('success', 'La subparte ha sido desactivada correctamente.');
        }else{
            DB::rollBack();
            return back()->with('error', 'Ocurrió un problema al desactivar la parte.');
        }
    }
}

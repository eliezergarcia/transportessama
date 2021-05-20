<?php

namespace App\Http\Controllers;

use App\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartController extends Controller
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

        $part = (new Part)->fill($request->all());
        $part->save();

        /*$user->roles()->attach($request->roles);*/

        if($part){
            DB::commit();
            return back()->with('success', 'La parte se agregó al tractor correctamente.');
        }else{
            DB::rollBack();
            return;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $part = Part::findOrFail($id);
        $part->update($request->all());

        if($part){
            DB::commit();
            return back()->with('success', 'La información de la parte se ha guardado correctamente.');
        }else{
            DB::rollBack();
            return back()->with('error', 'Ocurrió un problema al guardar la información de la parte.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        //
    }

    public function getPartsTruck($id)
    {
        $parts = Part::where('truck_id', $id)->where('inactive_at', null)->get();
        return $parts;
    }

    public function getPartsBox($id)
    {
        $parts = Part::where('box_id', $id)->where('inactive_at', null)->get();
        return $parts;
    }

    public function deactivate($id)
    {
        DB::beginTransaction();

        $part = Part::findOrFail($id);
        $part->deactivate();

        if($part){
            DB::commit();
            return back()->with('success', 'La parte ha sido desactivada correctamente.');
        }else{
            DB::rollBack();
            return back()->with('error', 'Ocurrió un problema al desactivar la parte.');
        }
    }
}

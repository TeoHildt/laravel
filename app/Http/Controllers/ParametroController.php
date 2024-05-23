<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateParametroRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ParametroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function parametro() : View
    {
        return view('students.parametro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeParam(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Parametro $parametro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parametro $parametro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParametroRequest $request, Parametro $parametro) : RedirectResponse
    {
        $paramName = $request->input('id');
        $newDias = $request->input('total_clases');
        $newProm = $request->input('promocion');
        $newReg = $request->input('regularizacion');

        //encontrar id 1
        $parameter = Parametro::where('id', $paramName)->first();

        if ($parameter) {
            
            $parameter->total_clases = $newDias;
            $parameter->promocion = $newProm;
            $parameter->regularizacion = $newReg;

            $parameter->save();

            // Optionally, redirect back with a success message
            
            return back()->withSuccess('Parameter updated successfully.');
        }} 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parametro $parametro)
    {
        //
    }
}

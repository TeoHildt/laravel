<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
    public function update(Request $request, Parametro $parametro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parametro $parametro)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Assist;
use App\Models\Student;
use App\Http\Requests\StoreAssistRequest;
use App\Http\Requests\UpdateAssistRequest;

class AssistController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssistRequest $request, Student $student) : RedirectResponse
    {
        Assist::create($request->all());
        return redirect()->route('students.assist')
            ->withSuccess('Nuevo alumno añadido exitosamente.');
    }


    public function storeAssist(StoreAssistRequest $request) : RedirectResponse
    {
        $student_id = $request->student_id;
        
        Assist::create([
            'student_id' => $student_id,
        ]);
        return redirect()->back()->withSuccess('Assist added successfully.');
        
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Assist $assist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assist $assist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssistRequest $request, Assist $assist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assist $assist)
    {
        //
    }
}

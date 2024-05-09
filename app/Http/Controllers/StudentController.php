<?php

namespace App\Http\Controllers;
//hola
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreAssistRequest;
use App\Http\Requests\AddAssistRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('students.index', [
            'students' => Student::latest()->paginate(6)
        ]);
    }

    public function mostrarAsistencias($id){
        $student = Student::with('assists')->find($id);
        return view('students.assists',['student' => $student]);
    }

    public function showAssists($id)
    {
    $student = Student::with('assists')->find($id);
    return view('students.assists', compact('student'));
    }


    public function checkStudent(StoreAssistRequest $request)
    {
    $studentDNI = $request->input('student_dni');
    $student = Student::where('dni', $studentDNI)->first();

    if ($student) {
        // Student exists, create an assist
        Assist::create([
            'student_dni' => $student->dni,
            // other fields here...
        ]);

        return redirect()->back()->with('success', 'Assist created successfully');
    } else {
        // Student does not exist
        return redirect()->back()->with('error', 'Student not found');
    }
    }


    public function assist() : View
    {
        return view('students.assist');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request) : RedirectResponse
    {
        Student::create($request->all());
        return redirect()->route('students.index')
            ->withSuccess('Nuevo alumno añadido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student) : View
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student) : View
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student) : RedirectResponse
    {
        $student->update($request->all());
        return redirect()->back()
            ->withSuccess('Alumno actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
            ->withSuccess('Alumno eliminado exitosamente.');
    }
}

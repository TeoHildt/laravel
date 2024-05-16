<?php

namespace App\Http\Controllers;
//hola
use App\Models\Student;
use App\Models\Assist;
use App\Http\Controllers\AssistController;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreAssistRequest;
use App\Http\Requests\AddAssistRequest;
use App\Http\Requests\StudentAssistRequest;

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





    public function assist() : View
    {
        return view('students.assist');
    }



    public function assistDni(StudentAssistRequest $request)
    {
        $dni = $request->input('dni');
        $student = Student::with('assists')->where('dni', $dni)->first();

        if ($student) {
            // si encuentra
            return view('students.assist', compact('student'));
        } else {
            // si no
            return back()->withErrors(['dni' => 'No student found with the provided DNI.']);
        }
    }

    public function storeAssist(StoreAssistRequest $request) : RedirectResponse
    {
       
        $student_id = $request->student_id;
        $student = Student::where('id',$student_id)->first();
        if($student){

        Assist::create([
            'student_id' => $student_id,
            'created_at' => now()->toDateString(),
        ]);

        return redirect()->back()->withSuccess('Assist added successfully.');
    }
    }
 

    //======CREATE==========
    public function create() : View
    {
        return view('students.create');
    }

    //======STORE========
    public function store(StoreStudentRequest $request) : RedirectResponse
    {
        $data = $request->except('_token');

        $dob = \Carbon\Carbon::parse($data['birthday']);
        $age = $dob->diffInYears(\Carbon\Carbon::now());

        if ($age < 18){
            return redirect()->back()->withInput()->withErrors(['birthday' => 'muy chico']);
        }

        Student::create($request->all());
        return redirect()->route('students.index')
            ->withSuccess('Nuevo alumno añadido exitosamente.');
    }

    //=======SHOW=======
    public function show(Student $student) : View
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    //=======EDIT=========
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

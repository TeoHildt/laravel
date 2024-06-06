<?php

namespace App\Http\Controllers;
//hola
use App\Models\Student;
use App\Models\Assist;
use App\Models\Log;
use App\Models\Parametro;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\ParametroController;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreAssistRequest;
use App\Http\Requests\AddAssistRequest;
use App\Http\Requests\StudentAssistRequest;
use Illuminate\Support\Facades\Auth;
use PDF;


//$clientIP = \Request::ip();
//$clientIP = $request->ip();

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

    public function exportPDF($id){
        
        $parametro = Parametro::where('id', 1)->first();
        $student = Student::with('assists')->find($id);
        // Share data with the view
        $pdf = PDF::loadView('students.assists', compact('student','parametro'));
    
        // Download the PDF
        return $pdf->download('filename.pdf');
    }

    public function showAssists($id)
    {
    $parametro = Parametro::where('id', 1)->first();

    $student = Student::with('assists')->find($id);

    return view('students.assists', compact('student', 'parametro'));
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

        return back()->withSuccess('Asistencia añadida con éxito');
    }
    }
 

    //======CREATE==========
    public function create() : View
    {

        $clientIP = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        


        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Create Student',
            'ip' => $clientIP,
            'browser' => $userAgent,
        ]);
        return view('students.create');
    }

    //======STORE========
    public function store(StoreStudentRequest $request) : RedirectResponse
    {
        $data = $request->except('_token');

        $dob = \Carbon\Carbon::parse($data['birthday']);
        $age = $dob->diffInYears(\Carbon\Carbon::now());

        if ($age < 17){
            return redirect()->back()->withInput()->withErrors(['birthday' => 'El alumno debe tener una edad mínima de 17 años']);
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
        $clientIP = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        

        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Edit Student',
            'ip' => $clientIP,
            'browser' => $userAgent,
        ]);

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

    /*
    ==================DESTROY============================
     */
    public function destroy(Student $student)
    {
        $clientIP = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Delete Student',
            'ip' => $clientIP,
            'browser' => $userAgent,
        ]);

        $student->delete();
        return redirect()->route('students.index')
            ->withSuccess('Alumno eliminado exitosamente.');
    }
}

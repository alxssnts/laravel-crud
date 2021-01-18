<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

  public function index()
  {
    $students = Student::latest()->paginate(10);

    return view('student.index', [
      'students' => $students
    ]);
  }

  public function create()
  {
    return view('student.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required'],
      'email' => ['required', 'email'],
      'address' => ['required']
    ]);

    Student::create([
      'name' => $request->name,
      'email' => $request->email,
      'address' => $request->address
    ]);

    return redirect()
      ->route('students.index')
      ->with('success', 'Student has been added successfully');
  }
  
  public function show($id)
  {
    $student = Student::find($id);

    return view('student.show', [
      'student' => $student
    ]);
  }

  public function edit($id)
  {
    $student = Student::find($id);
    
    return view('student.edit', [
      'student' => $student
    ]);
  }

  public function update(Request $request)
  {
    $request->validate([
      'id' => ['exists:students,id'],
      'name' => ['required'],
      'email' => ['required', 'email'],
      'address' => ['required']
    ]);

    $student = Student::find($request->id);

    $student->update([
      'name' => $request->name,
      'email' => $request->email,
      'address' => $request->address
    ]);
    
    return redirect()
      ->route('students.index')
      ->with('success', 'Student has been updated successfully');
  }

  public function destroy($id)
  {
    Student::find($id)->delete();

    return redirect()
      ->route('students.index')
      ->with('success', 'Student has been deleted successfully');
  }
}

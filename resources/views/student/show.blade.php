@extends('layout.app')

@section('content')
  <div class="container">
    <h1>Student Information</h1>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control disabled" name="name" id="name"value="{{ $student->name }}" disabled>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control disabled" name="email" id="email" value="{{ $student->email }}" disabled>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control disabled" name="address" id="address" value="{{ $student->address }}" disabled>
    </div>

    <form action="{{ route('students.destroy', $student->id) }}" method="post">
      @csrf
      @method('DELETE')
      <a href="/students/{{ $student->id }}/edit" class="btn btn-primary">Edit</a>
      <button class="btn btn-danger" type="submit">Delete</button>
      <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Back</a>
    </form>
  </div>    
@endsection
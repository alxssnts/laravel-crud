@extends('layout.app')

@section('content')
  <div class="container">
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="post">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{ $student->id }}">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') border-danger @enderror" name="name" id="name" placeholder="Enter student name" value="{{ old('name',$student->name) }}">
        @error('name')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') border-danger @enderror" name="email" id="email" placeholder="Enter student email" value="{{ old('email', $student->email) }}">
        @error('email')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control @error('address') border-danger @enderror" name="address" id="address" placeholder="Enter student address" value="{{ old('address', $student->address) }}">
        @error('address')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <button class="btn btn-success" type="submit">Save</button>
      <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
  </div>    
@endsection
@extends('layout.app')

@section('content')
  <div class="container">
    <h1>Students</h1>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <table class='table table-striped'>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Date Created</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if ($students->count())
          @foreach ($students as $student)
            <tr>
              <td><a href="/students/{{ $student->id }}">{{ $student->name }}</a></td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->address }}</td>
              <td>{{ $student->created_at->toFormattedDateString() }}</td>
              <td>
                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <div class="btn-group" role="group">
                    <a href="students/{{ $student->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                  </div>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="5" class="text-center">No student record found</td>
          </tr>
        @endif
        
      </tbody>
    </table>
    {{ $students->links() }}

    <a href="{{ route('students.create') }}" class='btn btn-success' type='button'>Add Student</a>

  </div>
@endsection
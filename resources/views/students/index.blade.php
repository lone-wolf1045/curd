@extends('students.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New student</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Nid</th>
            <th>Age</th>
            <th>Address</th>
            <th>Gender</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $student->image }}" width="100px"></td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->nid }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->gender }}</td>
            
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $students->links() !!}
        
@endsection
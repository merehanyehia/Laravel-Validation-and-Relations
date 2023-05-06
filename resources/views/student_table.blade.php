@extends('layouts.app')


@section('content')
@if(session('success'))
<div class="alert alert-success w-50">

   {{session('success')}}
    </div>
    @endif
<table class=" table table-dark ">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">IDno</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Author</th>

      <th >update</th>
      <th >Delete</th>

    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
    <tr class="text-center">
      <th scope="row">{{$student->id}}</th>
      <td>{{$student->IDno}}</td>
      <td>{{$student->name}}</td>
      <td>{{$student->age}}</td>
      <td>{{$student->user->name}}</td>
      <td><a type="button" class="btn btn-success" href="{{route('student.edit',$student->id)}}" >Update</a>&nbsp;&nbsp;&nbsp;
      </td>
      <td>
<form action="{{route('student.destroy',$student->id)}}" method="post">
  @method('delete')
  @csrf
      <input type="submit" value="Delete" class="btn btn-danger">
      </form>
</td>
    </tr>
    @endforeach
   
  </tbody>
</table>

@endsection
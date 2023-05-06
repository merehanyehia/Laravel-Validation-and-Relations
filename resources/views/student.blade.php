@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success w-50">

   {{session('success')}}
    </div>
    @endif
{!!Form::open(['route' => 'student.store','method' => 'post', 'class'=>'ms-5 mt-5']) !!}

  <div class="mb-3 ms-5">
  <strong> {!! Form::label('IDno', 'IDno', ['class' => 'form-label'])!!}</strong>
  <!-- <strong> <label for="IDno" class="form-label">IDno</label></strong>  -->
    <input type="text" class="form-control w-50 @error('IDno') is-invalid @enderror" id="IDno" name="IDno">

    @if($errors->has('IDno'))
    <div class="alert alert-danger w-50">
      <ul>
        @foreach($errors->get('IDno') as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  </div>
  <div class="mb-3 ms-5">
  <strong> {!! Form::label('name', 'Name', ['class' => 'form-label'])!!}</strong>
  <!-- {!!Form::text('name',null, ['class' => 'form-control w-50','id' => 'name'])!!} -->
  <input type="text" class="form-control w-50 @error('name') is-invalid @enderror" id="name" name="name">

  @if($errors->has('name'))
    <div class="alert alert-danger w-50">
      <ul>
        @foreach($errors->get('name') as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  </div>
  <div class="mb-3 ms-5 ">
  <strong> {!! Form::label('age', 'Age', ['class' => 'form-label'])!!}</strong>
  <!-- {!!Form::number('age',null, ['class' => 'form-control w-50','id' => 'age','min'=>'5','max'=>'30'])!!} -->
  <input type="number" class="form-control w-50 @error('age') is-invalid @enderror" id="age" name="age" min='21' max='35'>

  @if($errors->has('age'))
    <div class="alert alert-danger w-50">
      <ul>
        @foreach($errors->get('age') as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  </div>
  <div class=" mt-5 text-center">
  {!!Form::submit('Add',['class' => 'btn btn-dark ps-5 pe-5'])!!}
  </div>
  {!!Form::close() !!}


@endsection
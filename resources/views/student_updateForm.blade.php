@extends('layouts.app')

@section('content')
{!!Form::model($student,['route' => ['student.update', $student->id],'method' => 'put','class'=>'ms-5 mt-5']) !!}
  <div class="mb-3 ms-5">
  <strong> {!! Form::label('IDno', 'IDno', ['class' => 'form-label'])!!}</strong>
    <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
    <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
    {!!Form::text('IDno',null, ['class' => ['form-control', 'w-50',($errors->has('IDno') ? 'is-invalid' : '')],'id' => 'IDno'])!!}
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
  {!!Form::text('name',null, ['class' => ['form-control' ,'w-50',($errors->has('name') ? 'is-invalid' : '')],'id' => 'name'])!!}
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
  {!!Form::number('age',null, ['class' => ['form-control','w-50',($errors->has('age') ? 'is-invalid' : '')],'id' => 'age','min'=>'21','max'=>'30'])!!}
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
  {!!Form::submit('Update',['class' => 'btn btn-dark ps-5 pe-5'])!!}
  </div>
  {!!Form::close() !!}

@endsection
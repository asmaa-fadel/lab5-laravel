@extends('layouts.app')
@section('content')
<div class="container">
{!! Form::model($phone,['route' => ['phones.update',$phone->id],'method'=>'put']) !!}
<div class="form-group">
    <label for="phone">phone number</label>
    {{Form::text('phone',null,['class' => 'form-control m-3'])}}
    @foreach ($errors->all() as $error)
    <div class="container alert alert-danger p-3">{{$error}}</div> 
   @endforeach
    {{Form::submit('add',['class' => 'btn btn-primary '])}}
</div>
</div>
{!! Form::close() !!}
@endsection

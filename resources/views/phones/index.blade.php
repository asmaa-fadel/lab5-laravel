@extends('layouts.app')
@section('content')
@if(session('success'))
 <div class=" container alert alert-success">
{{session('success')}}
 </div>
@endif
<div class="container row">
@foreach ($phone as $user)
<div class="col-md-6 pt-3 ps-5">
    <span>This is user phone {{ $user->phone_number }}</span>
</div>
 <div class="col-md-3"> 
     @can('update',$user)
     <a class="btn btn-info m-3" href="{{ route('phones.edit',$user->id) }}">edit</a>
     @endcan 
</div>   
 <div class="col-md-3 pt-3"> 
    {!! Form::open(['route' => ['phones.destroy',$user->id],'method'=>'delete']) !!}
    @can('delete',$user)
    <input type="submit" value="delete" class="btn btn-danger">
    @endcan 
    {!! Form::close() !!}
</div> 
   
@endforeach
</div>
@endsection
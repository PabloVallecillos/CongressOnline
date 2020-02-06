@extends('index')
@section('content')
  
   @foreach($presentations as $presentation)
        <img src="{{ url('ver/'.$presentation->id)}}"></img>
    @endforeach
<form action="{{ url('upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="texto" value="texto">
    <input type="file" name="file" id="file1">
    <input type="submit" value="enviar">
</form>

@stop
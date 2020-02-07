@extends('index')
@section('content')
  
   @foreach($presentations as $presentation)
    <div class="containerUpload">
        <iframe src="{{ url('ver/'.$presentation->id)}}" class="pdf"></iframe>
        
        <form action="{{ url('upload/'.$presentation->id) }}" method="post" enctype="multipart/form-data" class="forms">
            @csrf
            <input type="file" name="file" >
            <input type="submit" value="enviar">
        </form>
    </div>
       
    
    @endforeach

@stop
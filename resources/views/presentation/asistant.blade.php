@extends('index')

@section('content')

    
    <div class="container">
        <div class="column justify-content-center">
       
            ESTA INTENTANDO INCRIBISTE A {{$presentations->tittle}}
      
     <p>Print icon: <a href="{{url('asistant/'. $presentations->id . '/pdf')}}"> <span class="glyphicon glyphicon-print"></span> </a> </p>
           
     <p>PAGAAAAAAAA: <a href="{{url('subir/'. $presentations->id )}}"> <span class="glyphicon glyphicon-eur"></span> </a> </p>
    </div>
           <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          
        </div>
    </div>
         
            
        </div>
       
    </div>

@endsection

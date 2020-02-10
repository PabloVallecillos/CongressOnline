@extends('index')

@section('content')

    <div class="content">
        <div class="column justify-content-center space">
       
            <h1> You are trying to subscribe {{$presentations->tittle}} </h1>
      
            <h3 class="auto">You need to proceed the payment: <a  href="{{url('asistant/'. $presentations->id . '/pdf')}}"> <span class="glyphicon glyphicon-print color size"></span> </a> </h3>
           
            <h3 class="auto">If you have a payment certificate click this icon: <a href="{{url('subir/'. $presentations->id )}}"> <span class="glyphicon glyphicon-eur color size"></span> </a> </h3>
        </div>
          <!-- <div class="form-check">-->
          <!--  <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
          <!--  <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
          <!--</div>-->
          <!--<button type="submit" class="btn btn-primary">Submit</button>-->
    </div>

@endsection

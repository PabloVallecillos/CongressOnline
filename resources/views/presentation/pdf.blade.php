@extends('index')

@section('content')

    
      <div class="container2">
          
           <h1>PDF $</h1>
           <p>Fill out the details below and the PDF will download.</p>
      
      <form method="post" action="{{url('submitForm')}}" class="form2">
      {{csrf_field()}}

        <div class="left">
          <div class="margin">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" name="first_name" placeholder="First Name">
          </div>
          <div class="margin">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control"  name="last_name" placeholder="Last Name">
          </div>
            <div class="margin">
            <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
            <input class="form-control" type="email" name="email" placeholder="Email" >
          </div>
        </div>



            <div class="right">
              <div class="margin">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class="form-control" type="tel" name="phone" placeholder="Phone" >
              </div>

            <div class="margin">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input class="form-control" type="number" name="card" placeholder="Credit Card" >
            </div>
            
            <div class="margin">
                <span class="input-group-addon"><i class="glyphicon glyphicon-print"></i></span>
                <button class="form-control" type="submit"> GET PUTO PDF </a></button>
            </div>
          </div>
       
        
       </form>
      </div>
     

@endsection

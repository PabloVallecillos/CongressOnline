@extends('index')

@section('content')

    <div class="container">
        <div class="column justify-content-center">
          @foreach($presentations as $presentation)
            <div class="col-md-12">
                <div class="card-deck">
                      <div class="card margintop">
                            <div class="card-body">
                              <h3 class="card-title button2">{{ $presentation->tittle }}</h3>
                              <p class="card-text"></p>
                              
                              
                                <div class="videocongress">
                                    <img src="{{ asset('assets/img/congress.jpg') }}"></img>
                                </div>
                                  <iframe 
                                      width="560"
                                      height="315" 
                                      src="{{ $presentation->video }}?modestbranding=1&showinfo=0&rel=0&cc_load_policy=1&iv_load_policy=3&theme=light&color=white&autohide=0&disablekb=1" 
                                      frameborder="0" 
                                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                      allowfullscreen style="display:none;">
                                  </iframe>
                                
                              @auth
                              
                                  <a class="button btn btn-light my-2 my-sm-0 big" href="{{url('asistant/'.$presentation->id)}}" role="button">Subscribe <i class="fa fa-share" style="font-size:2.5rem" aria-hidden="true"></i></a> 
                              @endauth
                            </div>
                        <div class="card-footer">
                          <h5>Upload time : {{ $presentation->created_at }}</h5>
                        </div>
                      </div>
                 </div>
            </div>
         @endforeach
            
        </div>
         <!-- BOTONES DE PAGINACION-->
                <!--{{ $presentations->appends(['sort' => 'votes'])->onEachSide(2)->links() }}-->
    </div>

@endsection

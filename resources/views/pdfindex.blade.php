@extends('index')

@section('content')
<table class="table-md table-striped ">
  <thead>
    
    <th class="thb">Name</th>
    <th class="thb">Last Name</th>
    <th class="thb">Phone</th>
    <th class="thb">Email</th>
    <th class="thb">Card</th>
    <th class="thb">Action</th>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      
      <td class="tdb">{{$user->first_name}}</td>
      <td class="tdb">{{$user->last_name}}</td>
      <td class="tdb">{{$user->phone}}</td>
      <td class="tdb">{{$user->email}}</td>
      <td class="tdb">{{$user->card}}</td>
      <td class="tdb"><a href="{{action('pdfDetailController@downloadPDF', $user->id)}}">PDF</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
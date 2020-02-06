@extends('index')

@section('content')
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Full Name</th>
    <th>Address</th>
    <th>City</th>
    <th>Zip Code</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->first_name}}</td>
      <td>{{$user->last_name}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->email}}</td>
      <td><a href="{{action('pdfDetailController@downloadPDF', $user->id)}}">PDF</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
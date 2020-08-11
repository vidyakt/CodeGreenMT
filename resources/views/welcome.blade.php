@extends('layouts.app')
@section('content')
<div class="container">
  <h2>User's List</h2>
   <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->user_detail->name}}</td>
            <td>{{$user->user_detail->email}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection
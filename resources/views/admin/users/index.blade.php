@extends('layouts.admin')

@section('content')

    <table class="table table-hover">
        <thead>
          <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Photo</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)

          <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td><img height="49" src="{{$user->photo ? $user->photo->path : 'http://placehold.it/400x400'}}" alt=""></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name : 'no role'}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>

            @endforeach
        @endif

        </tbody>
     </table>

    @endsection
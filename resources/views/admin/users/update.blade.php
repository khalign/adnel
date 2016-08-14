@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>
    
    <div class="col-sm3">

        <img src="{{$user->photo ? $user->photo->path : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        
    </div>
    
    <div class="col-sm9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
    
        <div class="form-group">
    
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', [''=>'Choose option'] + $roles, null, ['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', array(0=>'Not active', 1=> 'Active'), null, ['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::submit('Update User', ['class'=>'btn btn-primary'] ) !!}
    
        </div>
    
        {!! Form::close() !!}

    </div>


    @include('includes.errors')


@endsection
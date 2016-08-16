@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>


    <table class="table table-hover">
        <thead>
        <tr>
            <th>Post ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Owner</th>
            <th>Category ID</th>
            <th>Photo ID</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category_id ? $post->category_id : 'no category'}}</td>
                    <td><img height="49" src="{{$post->photo  ? $post->photo->path : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach
        @endif

        </tbody>
    </table>

@endsection
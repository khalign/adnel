@extends('layouts.blog-post')



@section('content')

    <!-- Blog Post -->

    <div>

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->path}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>
        <p>{{$post->body}}</p>

        <hr>

    </div>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        @if(Auth::check())

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

        <div class="form-group">

            <input type="hidden" name="post_id" value="{{$post->id}}">

            {{--{!! Form::label('name', 'Name') !!}--}}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}

        </div>

        <div class="form-group">

            {!! Form::submit('Submit', ['class'=>'btn btn-primary'] ) !!}

        </div>

        {!! Form::close() !!}

        @endif


    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->

    @if(count($comments)>0)

        @foreach($comments as $comment)

    <div class="media">

        <a class="pull-left" href="#">
            <img height="67" class="media-object" src="{{$comment->photo ? $comment->photo : 'http://placehold.it/67x67'}}" alt="">
        </a>


        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at}}</small>
            </h4>

            {{$comment->body}}

        </div>

            <!-- Nested Comment -->


            <div class="media">



                        <div class="comment-reply-container">

                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                            <div class="comment-reply">

                                {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@reply']) !!}

                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                <div class="form-group">

                                    {{--{!! Form::label('name', 'Name') !!}--}}
                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}

                                </div>

                                <div class="form-group">

                                    {!! Form::submit('Reply', ['class'=>'btn btn-primary'] ) !!}

                                </div>

                                {!! Form::close() !!}

                            </div>


                        </div>



                        @if(count($comment->replies)>0)

                            @foreach($comment->replies as $reply)

                                <div id="reply" >

                                    <a class="pull-left" href="#">
                                        <img height="61" class="media-object" src="{{$reply->photo ? $reply->photo : 'http://placehold.it/61x61'}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at}}</small>
                                        </h4>
                                        <p>{{$reply->body}}</p>
                                    </div>

                                </div>

                            @endforeach

                        @endif

            </div>
            <!-- End Nested Comment -->
    </div>

        @endforeach

    @endif

@endsection

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function () {

            $(this).next().slideToggle("slow");

        });

    </script>

@endsection
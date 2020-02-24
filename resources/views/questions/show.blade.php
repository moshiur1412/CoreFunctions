@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1> {{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary"> Back to All Questions </a>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="media">

                        <div class="d-fex flex-column vote-controls">

                            <a href="" title="This question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"> </i>
                            </a>

                            <span class="votes-count"> 1024 </span>

                            <a href="" title="This question is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>

                            <a href="" title="Click to mark as favorite question (Click again to undo)" class="favorite mt-2 favorited">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count"> 1254 </span>
                             </a>

                        </div>

                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Questioned {{ $question->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{$question->user->url}}">
                                    <img src="{{$question->user->gravatar }}" alt="{{$question->user->name}}">
                                    </a>
                                    <div class="media-body m-1">
                                        <a href="{{ $question->user->url }}"> {{ $question->user->name }} </a>
                                    </div>
                                </div>
                            </div>

                        </div> <!--/* end media-body class -->
                    </div> <!--\* end media class -->
                </div><!--\* end card-body class -->
            </div><!--\* end card class -->
        </div><!--\* end col-md -->
    </div><!--\* end row class -->

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h2> Question Answer {{ $question->answers_count }}</h2>
                    </div>
                </div>

                    @foreach($question->answers as $answer)
                        <div class="card-body">
                                {!! $answer->body_html !!}

                           <div class="float-right">
                                <span class="text-muted"> Answered {{ $answer->created_date }} </span>
                                <div class="media mt-1">
                                        <a href="{{ $answer->user->url }}">
                                            <img src="{{ $answer->user->gravatar }}" alt="{{ $answer->user->name }}">
                                        </a>
                                    <div class="media-body m-1">
                                        <a href="{{ $answer->user->url }}"> {{ $answer->user->name }} </a>
                                    </div>
                                </div>
                           </div>

                        </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

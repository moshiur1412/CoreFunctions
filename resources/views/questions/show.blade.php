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

                            <a href="" title="This question is useful" class="vote-up {{ Auth::guest() ? 'off' : ''}}"
                            onclick="event.preventDefault(); document.getElementById('vote-up-{{$question->id}}').submit();">
                                <i class="fas fa-caret-up fa-3x"> </i>
                            </a>

                            <form action="{{route('questions.vote', $question->id)}}" id="vote-up-{{$question->id}}" method="POST" style="display:none;">
                            @csrf
                            <input type="hidden" name="vote" value="1">
                            </form>
                            <span class="votes-count "> {{ $question->votes_count }} </span>

                            <a href="" title="This question is not useful" class="vote-down {{Auth::guest() ? 'off' : ''}}"
                            onclick="event.preventDefault(); document.getElementById('vote-down-{{$question->id}}').submit();"
                            >
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>

                            <form action="{{route('questions.vote', $question->id)}}" id="vote-down-{{$question->id}}" method="POST" style="display:none;">
                            @csrf
                            <input type="hidden" name="vote" value="-1">
                            </form>

                            <a onclick="event.preventDefault(); document.getElementById('favorite-form-{{$question->id}}').submit();" title="Click to mark as favorite question (Click again to undo)" class="favorite mt-2 {{$question->isFavorite() > 0 ? 'favorited' : 'off'  }}">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count"> {{ $question->favorite_count }} </span>
                             </a>

                             <form action="{{ $question->isFavorite() ? route('questions.favorite', $question->id) : route('questions.unfavorite', $question->id)}}" id="favorite-form-{{$question->id}}" method="POST">
                                @csrf
                                @if($question->isFavorite())
                                @method('delete')
                                @endif
                            </form>
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



    @include('answers._index', [
       'answersCount' =>  $question->answers_count,
       'answers' => $question->answers,
    ])

    @include('answers._create')

</div>
</div>

@endsection

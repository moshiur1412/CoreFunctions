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
                            @include('shared._vote', [
                                'model' => $question,
                                'model_name' => 'Question'
                            ])
                           
                        </div>

                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4"></div>
                                <div class="col-4">
                                @include('shared._author', [
                                    'label' => 'Asked',
                                    'model' => $question
                                ])
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

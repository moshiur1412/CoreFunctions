@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justfy-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex align-items-center">
                        <h2>All Question</h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.create') }}" class="btn btn-secondary"> Ask Question </a>
                        </div>
                    </div>
                </div>
                    <div class="card-body">

                        @include('layouts._message')

                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong> {{ $question->votes }} </strong> {{ str_plural('Vote', $question->votes) }}
                                    </div>

                                    <div class="status {{ $question->status }}">
                                        <strong> {{ $question->answers }}</strong> {{ str_plural('Answer', $question->answers) }}
                                    </div>

                                    <div class="view">
                                       {{ $question->views ." ". str_plural('View', $question->views) }}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0"><a href="{{ $question->url }}"> {{ $question->title }} </a></h3>
                                        <div class="ml-auto">
                                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-outline-info"> Edit</a>
                                            <form class="form-delete" action="{{route('questions.destroy', $question->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger" onclick="confirm('Are you Sure?');">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Asked by <a href="{{$question->user->url }} ">{{ $question->user->name }} </a>
                                        <small class="text-muted"> {{$question->created_date}} </small>
                                    </p>
                                    {{ str_limit($question->body, 250) }}
                                </div>
                            </div>
                        <hr>
                        @endforeach
                            
                       {{ $questions->links() }}
                 </div>
               
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-contain-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Question</h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.index') }}" class="btn btn-outline-secondary"> Back All Question</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ $question->exists ? route('questions.update', $question->id) : route('questions.store') }}" method="POST">
                            @csrf
                            @if($question->exists)
                            @method('PUT')
                            @endif
                        <div class="form-group">
                            <label for="question_title">Question Title</label>
                            <input type="text" name="title" value="{{ $question->exists ? $question->title : old('title') }}" id="question_title" class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                                <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>  
                                 </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="questions_body">Qustion Body</label>
                            <textarea name="body" id="questions_body" class="form-control @error('body') is-invalid @enderror" rows="10">{{ old('body') }}</textarea>

                            @error('body')
                            <div class="invalid-feedback">
                            <strong>{{ $message }} </strong> 
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-outline-primary btn-large"> 
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
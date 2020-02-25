@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     Question Answer for the title  <strong> {{ $question->title }}  </strong>
                </div>

                    <div class="card-body">
                        <form action="{{route('questions.answers.update', [$question->id, $answer->id])}}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="body">Your Answer</label>
                                <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body', $answer->body) }} </textarea>

                                @error('body')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-outline-secondary form-control" type="submit">Submit</button>
                            </div>
                        </form>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection()

<div class="row mt-5">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title mt-2">
                <h2> {{ $answersCount ." ". str_plural('Answer', $answersCount) }}</h2>
            </div>
        </div>

        @include('layouts._message')

            @foreach($answers as $answer)
                <div class="card-body">
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This answer is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes_count"> 123 </span>
                            <a href="" title="This answer is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            @can('accept', $answer)
                                <a onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit()" title="Mark this as a best answer" class="{{ $answer->status }} mt-4">
                                <i class="fas fa-check fa-2x"></i>
                                </a>

                                <form action="{{route('answers.accept', $answer->id)}}" id="accept-answer-{{$answer->id}}" method="POST" style="display:none;">
                                @csrf
                                </form>
                                @else
                                @if($answer->isBest())
                                <a title="This is the best answer" class="{{ $answer->status }} mt-4"> <i class="fas fa-check fa-2x"></i> </a>
                                @endif
                            @endcan
                        </div>
                        <div class="media-body">
                        {!! $answer->body_html !!}

                        <div class="row">
                            <div class="col-4">
                                <div class="d-flex">
                                @can('update', $answer)
                                <a class="btn btn-outline-secondary mr-2" href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}">Edit</a>
                                @endcan
                                @can('delete', $answer)
                                <form action="{{route('questions.answers.destroy', [$question->id, $answer->id])}}" method="POST" class="form-delete">
                                    @csrf
                                    @method('Delete')
                                   <button class="btn btn-outline-danger" type="submit" onclick="confirm('Are you sure?')"> Delete </button>
                                </form>
                                @endcan
                            </div>


                            </div>
                            <div class="col-4">

                            </div>
                            <div class="col-4">
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

                        </div>
                    </div>
                </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>

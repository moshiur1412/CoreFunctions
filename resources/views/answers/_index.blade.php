<div class="row mt-5">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title mt-2">
                <h2> {{ $answersCount ." ". str_plural('Answer', $answersCount) }}</h2>
            </div>
        </div>

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
                            <a href="" title="Mark this as a best answer" class="answer-accepted mt-4">
                                <i class="fas fa-check fa-2x"></i>
                            </a>
                        </div>
                        <div class="media-body">
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
                    </div>  
                </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>

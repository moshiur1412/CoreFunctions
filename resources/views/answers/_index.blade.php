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
                        @include('shared._vote', [
                            'model' => $answer,
                            'model_name' => 'answer'
                        ])
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
                            
                            <div class="col-4"> </div>
                            <div class="col-4">
                                @include('shared._author',[
                                'label' => 'Answered',
                                'model' => $answer
                                ])
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

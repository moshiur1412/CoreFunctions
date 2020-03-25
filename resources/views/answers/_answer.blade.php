<div class="media post">
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
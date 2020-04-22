<answer :answer="{{ $answer }}" inline-template>
<div class="media post">
    <div class="d-flex flex-column vote-controls">
        @include('shared._vote', [
            'model' => $answer,
            'model_name' => 'Answer'
        ])
    </div>
    <div class="media-body">
        
        <form v-if="editing" @submit.prevent="update">
            <div class="form-group">
                <textarea v-model="body" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary" :disabled="isInvalid"> Update </button>
            <button class="btn btn-outline-secondary" @click="cancel" type="button"> Cancel </button>
        </form>
        <div v-else>
            <div v-html="bodyHtml"></div>
        
            <div class="row">
                <div class="col-4">
                    <div class="d-flex">
                        @can('update', $answer)
                        <a @click.prevent="edit" class="btn btn-outline-secondary mr-2" >Edit</a>
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
                    <user-info :model="{{$answer}}" label="Answered"></user-info>
                </div>
            </div>
        </div>
    </div>
</div>
</answer>
@can('accept', $model)
<a onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit()" title="Mark this as a best answer" class="{{ $model->status }} mt-4">
    <i class="fas fa-check fa-2x"></i>
</a>

<form action="{{route('answers.accept', $model->id)}}" id="accept-answer-{{$model->id}}" method="POST" style="display:none;">
    @csrf
</form>
@else
@if($model->is_best)
<a title="This is the best answer" class="{{ $model->status }} mt-4"> <i class="fas fa-check fa-2x"></i> </a>
@endif
@endcan
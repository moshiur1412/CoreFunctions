@can('accept', $answer)
<a onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit()" title="Mark this as a best answer" class="{{ $answer->status }} mt-4">
    <i class="fas fa-check fa-2x"></i>
</a>

<form action="{{route('answers.accept', $answer->id)}}" id="accept-answer-{{$answer->id}}" method="POST" style="display:none;">
    @csrf
</form>
@else
@if($answer->is_best)
<a title="This is the best answer" class="{{ $answer->status }} mt-4"> <i class="fas fa-check fa-2x"></i> </a>
@endif
@endcan
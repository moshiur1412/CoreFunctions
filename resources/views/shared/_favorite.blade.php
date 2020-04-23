<a onclick="event.preventDefault(); document.getElementById('favorite-form-{{$question->id}}').submit();" title="Click to mark as favorite question (Click again to undo)" 
    class="favorite mt-2 {{$question->isFavorite() > 0 ? 'favorited' : 'off'  }}">  <i class="fas fa-star fa-2x"></i>
    <span class="favorites-count"> {{ $question->favorite_count }} </span>
 </a>

 <form action="{{ $question->isFavorite() ? route('questions.favorite', $question->id) : route('questions.unfavorite', $question->id)}}" id="favorite-form-{{$question->id}}" method="POST">
    @csrf
    @if($question->isFavorite())
    @method('delete')
    @endif
</form>
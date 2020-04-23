<a onclick="event.preventDefault(); document.getElementById('favorite-form-{{$model->id}}').submit();" title="Click to mark as favorite question (Click again to undo)" 
    class="favorite mt-2 {{$model->isFavorite() > 0 ? 'favorited' : 'off'  }}">  <i class="fas fa-star fa-2x"></i>
    <span class="favorites-count"> {{ $model->favorite_count }} </span>
 </a>

 <form action="{{ $model->isFavorite() ? route('questions.favorite', $model->id) : route('questions.unfavorite', $model->id)}}" id="favorite-form-{{$model->id}}" method="POST">
    @csrf
    @if($model->isFavorite())
    @method('delete')
    @endif
</form>
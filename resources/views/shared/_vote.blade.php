<a title="This {{$model_name}} is useful" class="vote-up {{ Auth::guest() ? 'off' : ''}}" onclick="event.preventDefault(); document.getElementById('{{$model_name}}-vote-up-{{$model->id}}').submit();">
<i class="fas fa-caret-up fa-3x"> </i>
</a>

<form action="{{ $model_name == 'question' ? route('questions.vote', $model->id) : route('answers.vote', $model->id)}}" id="{{$model_name}}-vote-up-{{$model->id}}" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="vote" value="1">
</form>

<span class="votes-count "> {{ $model->votes_count }} </span>

<a title="This {{$model_name}} is not useful" class="vote-down {{Auth::guest() ? 'off' : ''}}" onclick="event.preventDefault(); document.getElementById('{{$model_name}}-vote-down-{{$model->id}}').submit();">
    <i class="fas fa-caret-down fa-3x"></i>
</a>

<form action="{{ $model_name == 'question' ? route('questions.vote', $model->id) : route('answers.vote', $model->id)}}" id="{{$model_name}}-vote-down-{{$model->id}}" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="vote" value="-1">
</form>

@if($model == $question)
    <favorite :question="{{$model}}"> </favorite>
{{-- @include('shared._favorite') --}}
@elseif($model == $answer)
    @include('shared._accept')
@endif


    
    
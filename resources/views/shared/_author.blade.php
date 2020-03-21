{{-- <div class="float-right">
    <span class="text-muted">{{ $label .' '. $model->created_date }}</span>
    <div class="media mt-2">
        <a href="{{$model->user->url}}">
        <img src="{{$model->user->gravatar }}" alt="{{$model->user->name}}">
        </a>
        <div class="media-body m-1">
            <a href="{{ $model->user->url }}"> {{ $question->user->name }} </a>
        </div>
    </div>
</div> --}}

<div class="col-4">
    <span class="text-muted"> {{ $label .' '. $model->created_date }} </span>
    <div class="media mt-1">
            <a href="{{ $model->user->url }}">
                <img src="{{ $model->user->gravatar }}" alt="{{ $model->user->name }}">
            </a>
        <div class="media-body m-1">
            <a href="{{ $model->user->url }}"> {{ $model->user->name }} </a>
        </div>
    </div>
</div>

@if($answersCount > 0)
<div class="row mt-5" v-cloak>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-2">
                    <h2> {{ $answersCount ." ". str_plural('Answer', $answersCount) }}</h2>
                </div>
            </div>
            
            @include('layouts._message')
            
            @foreach($answers as $answer)
                @include('answers._answer')            
            @endforeach
        </div>
    </div>
</div>
@endif
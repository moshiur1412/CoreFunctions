@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <task-component :tasks={{$tasks}}></task-component>
    </div>

</div>
@endsection
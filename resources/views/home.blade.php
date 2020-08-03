@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    Dropzone.options.dropzone = 
    {
        maxFilesize: 12, // 12 MB
        renameFile: function(file){
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg, .jpg, .png, .gif",
        addRemoveLinks: true,
        timeout:5000,
        success: function(file, response)
        {
            console.log(response);
        },
        error: function(file, response){
            return false;
        }

    }
</script>
@endsection

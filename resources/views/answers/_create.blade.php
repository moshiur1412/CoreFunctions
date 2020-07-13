<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2> Answer The Question</h2>
            </div>

            <div class="card-body">
                <form action="{{route('questions.answers.store', $question->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="body">Your Answer:</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"> {{ old('body') }}</textarea>

                        @error('body')
                        <div class="invalid-feedback">
                            <strong> {{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-secondary">Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

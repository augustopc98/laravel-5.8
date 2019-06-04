@extends('layouts.app')

@section('content')
<div class="container">
    <form action="">
        <div class="row">
            <div class="cool-8 offset-4">


                <div class="form-group row">
                    <label for="caption" class="col-md-6 col-form-label">Post Caption</label>

                        <input id="caption"
                        type="text"
                        class="form-control @error('caption') is-invalid @enderror"
                        caption="caption"
                        value="{{ old('caption') }}"
                        autocomplete="caption" autofocus>

                            @error('caption')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-6 col-form-label">Post Image</label>

                    <input type="file", class="form-control-file" id="image" name="image">
                </div>

            </div>
        </div>
    </form>
</div>
@endsection

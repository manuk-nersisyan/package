<form  action="{{ route('save-package') }}" method="post">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
        <div class="col-md-6">
            <select name="status" disabled class="form-control" data-live-search="true" title="Select Client">
                    <option value="">{{ \App\Package::listStatus()[\App\Package::STATUS_PENDING] }}</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-danger">{{ $errors->first('status') }}</p>
            @endif
        </div>
    </div>
    {{ csrf_field() }}
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>

<form  action="{{ route('admin-update-package',['id'=>$package->id]) }}" method="post">
    @method('PUT')
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ (old('name'))?old('name'):$package->name }}" required autocomplete="name" autofocus>
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
            <select name="status"  class="form-control @error('status') is-invalid @enderror">
                <option value="{{ \App\Package::STATUS_PENDING }}" {{ ($package->status == \App\Package::STATUS_PENDING)? 'selected': '' }}>{{ \App\Package::listStatus()[\App\Package::STATUS_PENDING] }}</option>
                <option value="{{ \App\Package::STATUS_CONFIRMED }}" {{ ($package->status == \App\Package::STATUS_CONFIRMED)? 'selected': '' }}>{{ \App\Package::listStatus()[\App\Package::STATUS_CONFIRMED] }}</option>
                <option value="{{ \App\Package::STATUS_DELIVERED }}" {{ ($package->status == \App\Package::STATUS_DELIVERED)? 'selected': '' }}>{{ \App\Package::listStatus()[\App\Package::STATUS_DELIVERED] }}</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>
        <div class="col-md-6">
            <select name="user_id"  class="form-control @error('user_id') is-invalid @enderror">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ ($package->user_id == $user->id)? 'selected': '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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

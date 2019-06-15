<form  action="{{ route('filter-packages') }}" method="get">
    <div class="form-group row">
        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
        <div class="col-md-6">
            <select name="status"  class="form-control" data-live-search="true" title="Select Client">
                <option value="all" {{ ($status == 'all'? 'selected': '') }}>All</option>
                <option value="{{ \App\Package::STATUS_PENDING }}" {{ ($status == \App\Package::STATUS_PENDING? 'selected': '') }}>{{ \App\Package::listStatus()[\App\Package::STATUS_PENDING] }}</option>
                <option value="{{ \App\Package::STATUS_CONFIRMED }}" {{ ($status == \App\Package::STATUS_CONFIRMED? 'selected': '') }}>{{ \App\Package::listStatus()[\App\Package::STATUS_CONFIRMED] }}</option>
                <option value="{{ \App\Package::STATUS_DELIVERED }}" {{ ($status == \App\Package::STATUS_DELIVERED? 'selected': '') }}>{{ \App\Package::listStatus()[\App\Package::STATUS_DELIVERED] }}</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-danger">{{ $errors->first('status') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Filter') }}
        </button>
    </div>
</form>

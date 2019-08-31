<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">نام گروه</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name',isset($group->name) ?$group->name: null )}}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right">دسته بندی خود را انتخاب کنید ..</label>

    <div class="col-md-6">
        <select class="form-control" id="subgroup" name="subgroup">
            @foreach($subgroup as $s)
                @if(old('subgroup',isset($s->name)  ))
                    <option value="{{old('subgroup',isset($s->name) ? $s->id: null)}}" selected>{{$s->name}}</option>
                @else
                    <option value="{{$s->id}}">{{$s->name}}</option>
                @endif
            @endforeach
        </select>

    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">عنوان آگهی</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
               value="{{ old('title',isset($ads->title) ?$ads->title: null )}}" required autofocus>

        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">نوع آگهی :</label>

    <div class="col-md-6">
        <input id="type1" type="radio" class="custom-radio" name="type" checked value="forsale">
        <label for="type1" class="col-md-4 col-form-label ">فروشی</label>
        <input id="type2" type="radio" class="custom-radio" name="type" value="request">
        <label for="type2" class="col-md-4 col-form-label ">درخواستی</label>
        @if ($errors->has('type'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">قیمت</label>

    <div class="col-md-6">
        <input id="price" type="number" class="form-control" name="price"
               value="{{ old('price',isset($ads->price) ?$ads->price: null )}}" placeholder="قیمت به تومان" required>
        @if ($errors->has('price'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">توضیحات آگهی </label>

    <div class="col-md-6">
        <textarea name="caption" id="caption" class="form-control">
           {{ old('title',isset($ads->caption) ?$ads->caption: null )}}
        </textarea>
        @if ($errors->has('caption'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('caption') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="image" class="col-md-4 col-form-label text-md-right">عکس </label>

    <div class="col-md-6">
        <input type="file" name="image" id="image">
        @if(isset($ads->image)&&$ads->image!=null)

            <img src="{{url('/images/'.$ads->image)}}" width="300" height="200" class="rounded">

        @endif
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
        @endif
    </div>
</div>

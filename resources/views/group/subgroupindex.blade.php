@extends('layouts.home')

@section('content')

    <div class="container">
        <form action="{{route('subgroup.store',$group->id)}}" method="post" >
            @csrf
            <div class="form-group row ">
                <label for="name" class="col-md-2 col-form-label text-center">نام زیر گروه</label>

                <div class="col-md-3">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name',isset($subgroup->name) ?$subgroup->name: null )}}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        ایجاد
                    </button>

                    <a href="{{route('group.index')}}" class="btn btn-success">بازگشت به گروه ها</a>

                </div>
            </div>
        </form>

        <br>

        @if($subgroup->isNotEmpty())
            <table class="table">
                @foreach($subgroup as $g)
                    <tr>
                        <td>{{$g->name}}</td>

                        <td>
                            <form action="{{route('subgroup.destroy',$g->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>
        @else
            <div class="alert alert-warning">هنوز دسته بندی ای ثبت نشده است !!</div>
        @endif
    </div>



@endsection
@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <br>
            @if($ads->isNotEmpty())
                <table class="table table-bordered text-center">
                    <tr>
                        <th>
                            عنوان
                        </th>
                        <th>
                            دسته بندی
                        </th>
                        <th colspan="2">
                            تغییرات
                        </th>

                        <th>
                            عکس
                        </th>
                    </tr>
                    @foreach($ads as $ad)
                        <tr>
                            <td>{{$ad->title}}</td>
                            <td>
                                {{$ad->subgroup->name}}
                            </td>
                            <td>
                                <a href="{{route('ads.edit',$ad->id)}}" class="btn btn-warning">ویرایش</a>
                            </td>
                            <td>
                                <form action="{{route('ads.destroy',$ad->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">حذف</button>
                                </form>
                            </td>
                            <td>
                                <img src="{{url('/images/'.$ad->image)}}" alt="{{$ad->title}}" class="rounded" width="200" height="100">
                                
                            </td>
                        </tr>
                    @endforeach

                </table>
                @else
                <div class="alert alert-warning">هنوز آگهی ای ثبت نشده است !!</div>
            @endif
            {{$ads->links()}}
        </div>
    </div>
@stop
@extends('layouts.home')

@section('content')
    <div class="container">
        <a class="btn btn-outline-primary" role="button" href="{{route('group.create')}} ">
            ایجاد گروه
        </a>
        <br>
        @if($group->isNotEmpty())
        <table class="table">
            @foreach($group as $g)
            <tr>
                <td>{{$g->name}}</td>
                <td>
                    {{$g->subgroup}}
                    <a href="{{route('subgroup.index',$g->id)}}" class="btn btn-info">ایجاد زیر گروه</a>
                </td>
                <td>
                    <a href="{{route('group.edit',$g->id)}}" class="btn btn-warning">ویرایش</a>
                </td>
                <td>
                    <form action="{{route('group.destroy',$g->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
                @endforeach

        </table>
        @else
            <div class="alert alert-warning">هنوز گروه ای ثبت نشده است !!</div>
        @endif
    </div>



@endsection
@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <br>
            @if($users->isNotEmpty())
                <table class="table table-bordered text-center">
                    <tr>
                        <th>
                            نام
                        </th>
                        <th>
                            شماره همراه
                        </th>
                        <th>
                            ایمیل
                        </th>
                        <th colspan="2">
                            تغییرات
                        </th>


                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                {{$user->phone}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                <form action="{{route('home.update',$user->id)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    @if($user->access_level=='admin')
                                    <button class="btn btn-success" type="submit">
                                        ادمین
                                    </button>
                                        @else
                                        <button class="btn btn-warning" type="submit">
                                            کاربر
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <form action="{{route('home.destroy',$user->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">حذف</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </table>
            @else
                <div class="alert alert-warning">هنوز کاربری ای ثبت نشده است !!</div>
            @endif
            {{$users->links()}}
        </div>
    </div>
@stop
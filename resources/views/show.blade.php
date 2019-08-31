@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <br>

            <div class="col-md-6 ">

                <h1>{{$ad->title}}</h1>
                <table class="table table-striped h4">

                    <tr>
                        <td>
                            دسته بندی
                        </td>

                        <td class="text-right">
                            {{$ad->subgroup->name}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            استان
                        </td>

                        <td class="text-right">
                            {{$ad->province->name}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            نوع
                        </td>

                        <td class="text-right">
                            @if($ad->type=='forsale')
                                فروشی
                            @else
                                درخواستی
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            قیمت
                        </td>

                        <td class="text-right">

                            {{$ad->price}} تومان&nbsp;

                        </td>
                    </tr>
                    <tr>
                        <td>
                            شماره همراه
                        </td>

                        <td class="text-right">

                            {{$ad->user->phone}}

                        </td>
                    </tr>
                </table>

            </div>

            <div class="col-md-6 ">
                <img src="{{url('/images/'.$ad->image)}}" width="500" height="400" class="rounded" alt="">
            </div>
        </div>
    </div>
@stop
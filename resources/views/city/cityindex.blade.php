@extends('layouts.app')

@section('content')
<div class="container text-center">
    @foreach($province as $p)

        <a href="{{route('city.store',$p->id)}}" class="btn btn-outline-danger col-md-3">{{$p->name}}</a>

        @endforeach
</div>

@stop
@extends('layouts.app')
@section('content')
<div class="container">

    @foreach($group as $g)
        <a href="{{route('ads.create',$g->id)}}" class="btn btn-success col-md-3">{{$g->name}}</a>

    @endforeach
</div>
    @stop
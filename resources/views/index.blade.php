@extends('layouts.app')

@section('content')

    <div class="float-right col-md-3">
        <div class="row">
            @foreach($group as $g)

                <a href="{{route('ads.index',['group'=>$g->id])}}" class="btn btn-secondary btn-block">{{$g->name}}</a>

            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($ads as $ad)
                <div class="col-md-4">
                    <div class="card mb-4 border-dark">
                        <img class="card-img-top" src="{{url('/images/'.$ad->image)}}" width="300" height="200"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$ad->title}}</h5>
                            <p class="card-text">{{$ad->content}}</p>
                            <div>
                                <hr>
                                قیمت :{{$ad->price}}
                                <hr>
                            </div>
                            <a href="{{route('ads.show',$ad->id)}}" class="btn btn-success btn-sm">توضیحات بیشتر</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$ads->links()}}
        </div>
    </div>

@stop
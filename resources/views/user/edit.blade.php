@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">ویرایش آگهی</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('ads.update',$ads->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            @include('user._form')


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

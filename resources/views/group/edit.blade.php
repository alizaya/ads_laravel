@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ویرایش گروه</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('group.update',$group->id) }}">
                            @csrf
                            @method('Patch')
                            @include('group.partials._form')


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
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

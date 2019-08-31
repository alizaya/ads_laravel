@extends('layouts.home')

@section('content')
    <div class="container">

        @if(Session::has('warning'))
            <p class="alert alert-warning">{{ Session::get('warning') }}</p>
        @endif
        <table class="table">
            <tr>
                <td>
                    <a href="{{route('user.index')}}" class="btn btn-success">آگهی های شما</a>
                </td>

            </tr>
        </table>
    </div>
@endsection
@extends('layouts.home')

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <td>
                    <a href="{{route('user.index')}}" class="btn btn-success">آگهی های شما</a>
                </td>

            </tr>
        </table>
    </div>
@endsection
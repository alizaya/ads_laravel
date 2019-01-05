@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <td>
                        <a href="{{route('group.index')}}" class="btn btn-success"> گروه ها</a>
                    </td>
                    <td>
                        <a href="{{route('home.users')}}" class="btn btn-secondary">کاربران</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
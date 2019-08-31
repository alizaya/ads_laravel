<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::paginate(20);
        return view('admin.users', compact('users'));
    }

    public function toggle($id)
    {
        $user = User::findorfail($id);
        if ($user->access_level == 'user') {
            $user->access_level = 'admin';
        } else {
            $user->access_level = 'user';

        }
        $user->save();
        return back();

    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return back();
    }
}

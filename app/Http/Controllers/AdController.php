<?php

namespace App\Http\Controllers;

use App\Ad;
use App\City;
use App\Group;
use App\Http\Requests\AdRequest;
use App\SubGroup;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userindex()
    {
        $ads = Ad::orderby('id', 'desc')->where('user_id', \Auth::id())->paginate(10);
//        if (Cookie::get('province')) {
//            $city = Cookie::get('province');
//            $ads=$ads->where('city_id',$city);
//        }
        return view('user.adsindex', compact('ads'));
    }

    public function index(Request $request)
    {
        if (Cookie::has('province')) {
            $province = Cookie::get('province');
        } else {
            return redirect()->route('city.index');
        }
        \DB::enableQueryLog();

        $ads = Ad::orderby('id', 'desc');
            if($request->get('group'))
            {
                $id=SubGroup::where('group_id',$request->get('group'))->get(['id'])->toarray();
                foreach ($id as $i)
                {
                    $ads=$ads->orwhere('subgroup_id',$i['id']);

                }
            }

            $ads=$ads->where('city_id', $province)->paginate(20);
//            dd(\DB::getQueryLog());
        $group=Group::orderby('id','desc')->get();
        return view('index', compact(['ads','group']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $subgroup = SubGroup::all()->where('group_id', $id);

        return view('user.create', compact('subgroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request)
    {

        $imagename = 'noimg.jpg';

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->store('images');
                $imagename = (explode('/', $path))[1];
                $image = Image::make(Storage::get($path))->resize(500, 400);
                $image->save(public_path('images/' . $imagename));

            }
        }
        $subgroup = $request->get('subgroup');
        $city = Cookie::get('province');
        Ad::create($request->except('city', 'image', '_token', 'subgroup') + ['user_id' => Auth::id(), 'city_id' => $city, 'image' => $imagename, 'subgroup_id' => $subgroup]);
        return redirect()->route('ads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::findorfail($id);
        return view('show', compact('ad'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ads = Ad::findorfail($id);
        $subgroup = $ads->subgroup->group_id;
        $subgroup = SubGroup::all()->where('group_id', $subgroup);
        return view('user.edit', compact(['ads', 'subgroup']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdRequest $request, $id)
    {
        $ads = Ad::findorfail($id);
        $this->authorize('update', $ads);
        $imagename = $ads->image;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->store('images');
                $imagename = (explode('/', $path))[1];
                $image = Image::make(Storage::get($path))->resize(500, 400);
                $image->save(public_path('images/' . $imagename));

            }
        }
        $subgroup = $request->get('subgroup');

        $city = Cookie::get('province');
        $ads->update($request->except('city', 'image', '_token', 'subgroup') + ['user_id' => Auth::id(), 'city_id' => $city, 'image' => $imagename, 'subgroup_id' => $subgroup]);
        return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ads = Ad::findorfail($id);
        $this->authorize('delete', $ads);
        $ads->delete();
        return back();
    }
}

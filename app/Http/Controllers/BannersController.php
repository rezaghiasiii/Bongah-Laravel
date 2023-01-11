<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Http\Requests\ChangeBannerRequest;
use App\Models\Banner;
use App\Models\Photo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BannersController extends Controller
{
//    use AuthorizesUsers;

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $banners = Banner::all();
        return view('dashboard',compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(BannerRequest $request)
    {

        //store
        auth()->user()->banners()->create($request->all());

        flash()->success("Created !", "Your banner has been created.");

        //redirect
        return back();
    }


    public function show($id)
    {
        $banner = Banner::findOrFail($id);

        return view('banners.show', compact('banner'));
    }

    public function addPhotos($zip, $street,ChangeBannerRequest $request)
    {
        $photo = Photo::formFrom($request->file('photo'));

        return Banner::locatedAt($zip, $street)->addPhoto($photo);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Flash;
use App\Http\Requests\BannerRequest;
use App\Http\Utilities\Country;
use App\Models\Banner;
use App\Models\Photo;
use Illuminate\Http\Request;

class BannersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        //store
        Banner::create($request->all());

        flash()->success("Created !", "Your banner has been created.");

        //redirect
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $banner = Banner::locatedAt($zip, $street);
        return view('banners.show', compact('banner'));
    }

    public function addPhotos($zip, $street, Request $request)
    {
        $this->validate($request,
            [
                'photo' => 'required|mimes:jpg,jpeg,png,bmp'
            ]);


        $photo = Photo::formFrom($request->file('photo'));

        Banner::locatedAt($zip, $street)->addPhoto($photo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

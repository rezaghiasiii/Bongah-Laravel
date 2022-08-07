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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(BannerRequest $request): Response
    {

        //store
        auth()->user()->banners()->create($request->all());

        flash()->success("Created !", "Your banner has been created.");

        //redirect
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($zip, $street): View|Factory|Application
    {
        $banner = Banner::locatedAt($zip, $street);
        return view('banners.show', compact('banner'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addPhotos($zip, $street,ChangeBannerRequest $request): Response|Application|RedirectResponse|ResponseFactory
    {
        $photo = Photo::formFrom($request->file('photo'));

        return Banner::locatedAt($zip, $street)->addPhoto($photo);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}

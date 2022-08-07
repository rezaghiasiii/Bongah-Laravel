<?php

namespace App\Traits;
use App\Traits;
use App\Models\Banner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait AuthorizesUsers
{

    protected function userCreatedBanner($request)
    {
        return Banner::where([
            'zip' => $request->zip,
            'street' => $request->street,
            'user_id' => auth()->user()->id
        ])->exists();
    }

    public function unAuthorized(Request $request): Response|Application|RedirectResponse|ResponseFactory
    {
        if ($request->ajax()) {
            return response(['message' => 'Nope!'], 403);
        }

        \flash()->error('Nope');
        return back();
    }


}

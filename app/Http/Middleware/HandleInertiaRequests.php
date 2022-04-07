<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
                //globally share the roles and permissions for users so they accessible within the js pages
                'role' => is_null($request->user()) ? 0 : $request->user()->getRoleNames()[0],
                'permissions' => is_null($request->user()) ? 0 :  $request->user()->getPermissionsViaRoles()->pluck("name"),
            ],
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
          
        ]);     
    }
}



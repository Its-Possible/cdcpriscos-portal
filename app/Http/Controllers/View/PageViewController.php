<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageViewController extends Controller
{
    /**
     * Display a homepage
     */
    public function home()
    {
        //
        $slides = Http::timeout(60)->get(url('/api/slides'));
        $slides->throw();

        $slides_counter = Slide::count();

        $lastnews = Http::get(url('/api/posts'));

        return view('home')
            ->withSlides($slides->body())
            ->withSlidesCounter($slides_counter)
            ->withLastnews($lastnews->body());
    }

    /**
     * Display a login page
     */
    public function signIn()
    {
        //
        return view('auth.sign-in');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //
        $auth = Http::timeout(60)->post(route('cdcapi.auth.sign-in'), [
            'csrf_token' => csrf_token(),
            'email' => $request->email,
            'password' => $request->password
        ]);

        $auth->throw();

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => []
        ]);
    }
}

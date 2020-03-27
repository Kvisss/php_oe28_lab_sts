<?php

namespace App\Http\Controllers\Client;

use App\Http\Models\Course;
use App\Http\Models\Subject;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
        $this->middleware('check.role');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->load('courses');

        return view('client.index', compact('user'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        $subjects = $course->subject->load('tasks');

        return view('client.course-detail', compact(['course', 'subjects']));
    }
}

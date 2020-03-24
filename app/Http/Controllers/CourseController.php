<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Http\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::where('creator_id', (Auth::user()->id))->get();

        return view('admin.index', compact('courses'));
    }


    public function create()
    {
        return view('admin.courses.add-form');
    }


    public function store(CourseRequest $request)
    {
        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => config('constant.image.null'),
            'creator_id' => Auth::user()->id,
            'time' => $request->time,
        ]);

        return redirect()->route('courses.index');
    }


    public function show($id)
    {
        $courses = Course::where('id', $id)->first();
        if ($courses) {
            return view('admin.courses.view-detail', compact('courses'));
        } else {
            return null;
        }
    }


    public function edit($id)
    {
        $courses = Course::where('id', $id)->first();
        if ($courses) {
            return view('admin.courses.edit-form', compact('courses'));
        } else {
            return null;
        }

    }


    public function update(CourseRequest $request, $id)
    {
        Course::findOrFail($id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => config('constant.image.null'),
                'creator_id' => Auth::user()->id,
                'time' => $request->time,
            ]);

        return redirect()->route('courses.index');
    }


    public function destroy($id)
    {
        Course::findOrFail($id)
            ->delete();

        return redirect()->route('courses.index');

    }
}

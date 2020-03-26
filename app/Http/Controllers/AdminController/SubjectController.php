<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Models\Course;
use App\Http\Models\Subject;
use App\Http\Requests\SubjectRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Course::find(5)->subject;
//        dd($course);

//        $subjects = DB::table('subjects')
//            ->join('courses', 'subjects.course_id', '=', 'courses.id')
//            ->select('subjects.id as subject_id', 'subjects.title', 'courses.name', 'subjects.created_at')
//            ->get();

        return view('admin.subjects.index-subject', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.subjects.add-form', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        Subject::create([
            'title' => $request->title,
            'course_id' => $request->course_id,
        ]);

//        return redirect()->route('subjects.index');
        return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();

        $subject = Subject::findOrFail($id)
            ->first();

        return view('admin.subjects.edit-form', compact('subject', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        Subject::find($id)
            ->update([
                'title' => $request->title,
                'course_id' => $request->course_id,
            ]);
        return redirect()->route('subjects.index');
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

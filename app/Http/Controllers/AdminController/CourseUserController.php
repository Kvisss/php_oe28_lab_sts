<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;


class CourseUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(123);
//        $users = User::where('role_id', '=', config('constant.role.user'))
//            ->get();
        $courses = Course::where('creator_id', (Auth::user()->id))->get();

        return view('admin.courses.add-new-user-to-course', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = DB::table('users')
            ->where('username', '=', $request->username)
            ->select('id')
            ->first();
//        dd($user_id);
        $start_time = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('course_user')
            ->insert([
                'user_id' => $user_id->id,
                'course_id' => $request->course_id,
                'status' => config('constant.status.inactive'),
                'start_time' => $start_time->toDateString(),
                'end_time' => $start_time->addDays(2),

            ]);

        return redirect()->route('courses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('courses')
            ->join('course_user', 'courses.id', '=', 'course_user.course_id')
            ->join('users', 'course_user.user_id', '=', 'users.id')
            ->where('courses.id', '=', $id)
            ->select('courses.id', 'users.full_name', 'users.email', 'users.phone', 'course_user.status', 'course_user.id as course_user_id')
            ->get();

        return view('admin.courses.view-user-of-course', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkStatus = false;
        $user = DB::table('course_user')
            ->where('id', '=', $id)
            ->get();
        if ($user) {

            foreach ($user as $status) {
                if ($status->status == config('constant.status.inactive')) {
                    DB::table('course_user')
                        ->where('id', '=', $id)
                        ->update(['status' => config('constant.status.active')]);

                    return redirect()->back();
                } else {
                    DB::table('course_user')
                        ->where('id', '=', $id)
                        ->update(['status' => config('constant.status.inactive')]);

                    return redirect()->back();
                }
            }

        }

        return null;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DB::table('course_user')
            ->where('id', '=', $id)
            ->get();

        if ($user) {
            DB::table('course_user')
                ->where('id', '=', $id)
                ->delete();

            return redirect()->back();
        }
        return null;

    }

    public function showUser($id)
    {
        dd($id);
    }

}

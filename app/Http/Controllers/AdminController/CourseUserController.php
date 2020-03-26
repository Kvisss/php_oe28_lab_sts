<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\User;

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
        $users = User::where('role_id', '=', config('constant.role.user'))
            ->get();

        return view('admin.courses.add-new-user-to-course', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = DB::table('users')
            ->where('username', '=', $request->username);
        dd($data);
        DB::table('course_user')
            ->insert($data);
        return redirect()->back();
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

}

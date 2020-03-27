<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateCourseUser::class);
    }

}

class CreateCourse extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Học PHP cơ bản và nâng cao',
                'description' => '[Học PHP cơ bản và nâng cao,tự học lập trình PHP cơ bản hay nhất]PHP Hypertext Preprocessor (PHP) là một ngôn ngữ lập trình cho phép các lập trình viên web tạo các nội dung động mà tương tác với Database. Về cơ bản, PHP được sử dụng để phát triển các ứng dụng phần mềm trên web. Loạt bài hướng dẫn này giúp bạn hiểu những khái niệm cơ bản về PHP.',
                'image' => 'image 1',
                'creator_id' => 1,
                'time' => '5',
            ],
            [
                'name' => 'course 2',
                'description' => 'description 2',
                'image' => 'image 2',
                'creator_id' => 1,
                'time' => '8',
            ],

        ];
        DB::table('courses')->insert($data);
    }

}

class CreateUser extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ];
        DB::table('users')->insert($data);
    }

}

class CreateSubject extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'title_2',
                'course_id' => 5,
            ],
            [
                'title' => 'title_3',
                'course_id' => 5,
            ],
        ];
        DB::table('subjects')->insert($data);
    }

}

class CreateCourseUser extends Seeder
{
    public function run()
    {
        $data = [
//            [
//                'user_id' => 1,
//                'course_id' => 7,
//                'start_time' => '2020-03-25',
//                'end_time' => '2020-03-26',
//                'status' => '0',
//            ],
            [
                'user_id' => 2,
                'course_id' => 7,
                'start_time' => '2020-03-25',
                'end_time' => '2020-03-27',
                'status' => '1',
            ]
        ];
        DB::table('course_user')->insert($data);
    }
}

class CreateTasks extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'task_1',
                'content' => 'content of task_1',
                'subject_id' => 1,
            ],
            [
                'title' => 'task_2',
                'content' => 'content of task_2',
                'subject_id' => 1,
            ],
            [
                'title' => 'task_3',
                'content' => 'content of task_3',
                'subject_id' => 1,
            ],
        ];
        DB::table('tasks')->insert($data);
    }
}

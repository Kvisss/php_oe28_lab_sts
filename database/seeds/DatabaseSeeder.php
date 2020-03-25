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
        $this->call(CreateSubject::class);
    }

}

class CreateCourse extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'course 1',
                'description' => 'description 1',
                'image' => 'image 1',
                'creator_id' => 1,
                'time' => '5',
            ],
            ['name' => 'course 2',
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
            [
                'user_id' => 1,
                'course_id' => 5,
                'start_time' => '2020-03-25',
                'end_time' => '2020-03-26',
                'status' => '0',
            ], [
                'user_id' => 2,
                'course_id' => 5,
                'start_time' => '2020-03-25',
                'end_time' => '2020-03-27',
                'status' => '1',
            ]
        ];
        DB::table('course_user')->insert($data);
    }
}

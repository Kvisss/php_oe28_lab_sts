<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\CourseController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Models\Course;
use App\Http\Models\User;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Mockery;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Tests\TestCase;
use Illuminate\Validation\ValidationException;

class CourseControllerTest extends TestCase
{

    public function test_index_success()
    {
        $user = new User();
        $user->id = 2;
        Auth::shouldReceive('user')->andReturn($user);

        $controller = new CourseController();

        $result = $controller->index();

        $this->assertEquals('admin.index', $result->getName());
        $this->assertTrue(key_exists('courses', $result->getData()));

    }

    public function test_index_un_auth()
    {
        $controller = new CourseController();

        $this->expectExceptionMessage('Trying to get property \'id\' of non-object');

        $controller->index();
    }

    public function test_store()
    {
        $data = [
            'name' => 'New Course',
            'description' => 'test1',
            'time' => 20,
        ];

        $request = Mockery::mock(CourseRequest::class);
        $request->shouldReceive('all')->andReturn($data);
        $request->shouldReceive('route')->andReturn();

        $user = new User();
        $user->id = 2;
        Auth::shouldReceive('user')->andReturn($user);

        $controller = new CourseController();

        $result = $controller->store($request);
    }


    public function test_create()
    {
        $controller = new CourseController();
        $result = $controller->create();

        $this->assertEquals('admin.courses.add-form', $result->getName());
    }

    public function test_show()
    {
        $user = new User();
        $user->id = 2;
        Auth::shouldReceive('user')->andReturn($user);

        $controller = new CourseController();
        $result = $controller->show(1);

        $this->assertEquals('admin.courses.view-detail', $result->getName());
        $this->assertTrue(key_exists('courses', $result->getData()));
    }

    public function test_destroy()
    {
        $controller = new CourseController();
        $data = [
            'id' => 1,
        ];

        $request = Mockery::mock(CourseRequest::class);
        $request->shouldReceive('delete')->andReturn($data);
    }
}

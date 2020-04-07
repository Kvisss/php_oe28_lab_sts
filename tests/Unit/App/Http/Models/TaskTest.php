<?php


namespace Tests\Unit\Models;

use App\Http\Models\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    protected $task;

    public function setUp(): void
    {
        $this->task = new Task();

        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->task);

        parent::tearDown();
    }

    public function test_fillable()
    {
        $this->assertEquals(
            [
                'title',
                'content',
                'subject_id',
            ],
            $this->task->getFillable()
        );
    }
}

<?php


namespace Tests\Unit\Models;

use App\Http\Models\Course;
use App\Http\Models\Subject;
use App\Http\Models\Task;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use tests\Mockery\Matcher\SubsetTest;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    protected $subject;

    public function setUp(): void
    {
        $this->subject = new Subject();

        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->subject);
        parent::tearDown();
    }

    public function test_fillable()
    {
        $subject = new Subject();

        $this->assertEquals(['title', 'course_id'], $subject->getFillable());
    }

    public function test_subject_relation_belongsTo()
    {
        $relation = $this->subject->course();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('course_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_subject_relation_hasMany()
    {
        $relation = $this->subject->tasks();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('subject_id', $relation->getForeignKeyName());
    }



    public function test_properties_have_valid_values()
    {
        Subject::unguard();
        $initial = [
            'title' => 'test title',
            'course_id' => 1,
        ];

        $subject = new Subject($initial);
        $this->assertEquals($initial, $subject->attributesToArray());
    }


}

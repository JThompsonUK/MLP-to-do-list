<?php

namespace Tests\Feature;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    protected $newTask;

    protected function setUp(): void
    {
        parent::setUp();

        $this->newTask = Task::factory()->create();
    }

    /**
     * Test creating a new task.
     *
     * @test
     */
    public function it_can_create_a_task()
    {
        $response = $this->post('/tasks/store', ['name' => 'New Task']);

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task created successfully.');
        $this->assertDatabaseHas('tasks', ['name' => 'New Task']);
    }

    /**
     * Test marking a task as completed.
     *
     * @test
     */
    public function it_marks_task_as_completed_when_ticked()
    {
        $response = $this->patch(route('tasks.tick', $this->newTask->id));

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task marked as completed.');

        $this->assertDatabaseHas('tasks', [
            'id' => $this->newTask->id,
            'completed' => Carbon::now()
        ]);
    }

    /**
     * Test marking a task as not completed.
     *
     * @test
     */
    public function it_marks_task_as_not_completed_when_unticked()
    {
        $response = $this->patch(route('tasks.untick', $this->newTask->id));

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task marked as not completed.');

        $this->assertDatabaseHas('tasks', [
            'id' => $this->newTask->id,
            'completed' => null
        ]);
    }

    /**
     * Test deleting a task.
     *
     * @test
     */
    public function it_can_soft_delete_a_task()
    {
        $response = $this->delete(route('tasks.delete', $this->newTask->id));

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task deleted successfully.');

        $this->assertSoftDeleted('tasks', ['id' => $this->newTask->id]);
    }
}

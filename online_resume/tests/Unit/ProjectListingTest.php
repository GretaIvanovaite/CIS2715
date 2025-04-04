<?php

namespace Tests\Unit;

use App\Models\Project;
use Codeception\Test\Unit;
Use Illuminate\Foundation\Testing\RefreshDatabase;


class ProjectListingTest extends Unit
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_all_projects()
    {
        //Arrange
        Project::factory()->count(3)->create();

        //Act
        $projects = Project::all();

        //Assert
        $this->assertCount(3, $projects);

        foreach ($projects as $project) {
            $this->assertNotEmpty($project->title);
            $this->assertNotEmpty($project->description);
            $this->assertNotEmpty($project->technologies);
        }
    }

    /** @test */
    public function it_returns_empty_when_no_projects_exist()
    {
        //Act
        $projects = Project::all();

        //Assert
        $this->assertTrue($projects->isEmpty());
    }
}

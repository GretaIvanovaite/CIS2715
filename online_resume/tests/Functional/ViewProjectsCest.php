<?php

declare(strict_types=1);


namespace Tests\Functional;

use Tests\Support\FunctionalTester;

final class ViewProjectsCest
{
    public function _before(FunctionalTester $I): void
    {
        // Code here will be executed before each test.
    }

    public function seeProjectsSection(FunctionalTester $I)
    {
        $project = $I->haveInDatabase('projects', [
            'title' => 'Test Project',
            'description' => 'Example Project Description',
            'technologies' => 'Laravel, Eloquent, Blade, HTML, CSS',
        ]);

        $I->seeInDatabase('projects', ['id' => $project]);

        $I->amOnPage('/projects');
        $I->see('Software Projects', 'h1');
        $I->see('Test Project', 'h2');
        $I->see('Example Project Description', 'p');
        $I->see('Laravel, Eloquent, Blade, HTML, CSS', 'p');
    }

    public function seeNoProjectsMessage(FunctionalTester $I)
    {
        $I->amOnPage('/projects');
        $I->see('Software Projects', 'h1');
        $I->see('No projects available at this time', 'p');
    }
}

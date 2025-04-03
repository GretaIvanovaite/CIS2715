Feature: Viewing software projects on the portfolio page

  This feature allows visitors to browse a list of software projects,
  each with essential details such as the title, description, and technologies used.

  Scenario: Viewing a list of available software projects
    Given the portfolio website is live and accessible
    And at least one project is listed on the "My Software Projects" section
    When the user navigates to the "My Software Projects" section
    Then the user should see a list of projects with:
      | Title         |
      | Description   |
      | Technologies  |

  Scenario: No projects available
    Given the portfolio website is accessible
    And no projects are currently listed
    When the user navigates to the "My Software Projects" section
    Then the user should see a message stating "No projects available at this time"
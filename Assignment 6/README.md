# Research Project Management System

A university research lab wants to develop an internal tool to manage research project
records. This tool will help lab administrators keep track of ongoing projects, researchers
involved, and project funding. Design a PHP application with a form, database structure,
and CRUD operations to manage the research projects.

1. Design the Form
    - Create an HTML form with the following fields:
       o Project ID (number, unique)
       o Project Title (text, max 100 characters)
       o Lead Researcher (text, max 50 characters)
       o Funding Amount (number, representing funding in USD)
       o Project Status (dropdown: Ongoing, Completed, Paused, Cancelled)
       o Start Date (date input)
       o End Date (date input, optional)
    - Implement basic client-side validation (e.g., required fields, date validation).
2. Database Design
    - Design a MySQL database named research_management with a table named
       projects structured as follows:
          o id: Primary Key, Integer
          o project_id: Integer, unique
          o title: Varchar, 100 characters
          o lead_researcher: Varchar, 50 characters
          o funding_amount: Decimal, representing funding in USD
          o status: Varchar, 20 characters
          o start_date: Date
          o end_date: Date (optional)
3. CRUD Operations
    - Implement PHP scripts for the following operations:
       o Create: Insert new project details into the database.
       o Read: Display a table of all research projects.
       o Update: Edit project details based on Project ID.
       o Delete: Remove a project from the database based on Project ID.
# Project Management API

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/ayeshamehmood25/project-management.git
   cd project-management

2. Install the dependencies:
    composer install

3.  Copy the .env file and configure your database:
    cp .env.example .env

4. Generate the application key:
    php artisan key:generate
   
6.  Run the migrations and seed the database:
    php artisan migrate --seed

7.  Install Passport:
    php artisan passport:install

8.  Start the development server:
    php artisan serve


Database
The database schema is included in the project_management.sql file. To import the database, run the following command:

mysql -u your_username -p your_database_name < project_management.sql


### Authentication Endpoints

#### Register
**URL:** `POST /api/register`  
**Body:** JSON
```json
{
    "first_name": "John",
    "last_name": "Doe",
    "date_of_birth": "1990-01-01",
    "gender": "male",
    "email": "john.doe@example.com",
    "password": "password123"
}


Login
URL: POST /api/login
Body: JSON

{
    "email": "john.doe@example.com",
    "password": "password123"
}

Logout
URL: POST /api/logout
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN

User Endpoints
Get All Users
URL: GET /api/users
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Optional Query Parameters for Filtering: first_name, last_name, date_of_birth, gender, email

Get User by ID
URL: GET /api/users/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN

Create User
URL: POST /api/users
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Body: JSON
{
    "first_name": "Jane",
    "last_name": "Doe",
    "date_of_birth": "1985-05-15",
    "gender": "female",
    "email": "jane.doe@example.com",
    "password": "password123"
}


Update User
URL: PUT /api/users/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Body: JSON
{
    "first_name": "Jane Updated",
    "last_name": "Doe Updated"
}



Delete User
URL: DELETE /api/users/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN

**Project Endpoints

**Get All Projects

URL: GET /api/projects
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Optional Query Parameters for Filtering: name, department, start_date, end_date, status

** Get Project by ID

URL: GET /api/projects/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN

**Create Project
URL: POST /api/projects
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Body: JSON
{
    "name": "Project 1",
    "department": "IT",
    "start_date": "2024-01-01",
    "end_date": "2024-12-31",
    "status": "ongoing"
}



** Update Project
URL: PUT /api/projects/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Body: JSON
{
    "name": "Project 1 Updated",
    "status": "completed"
}


** Delete Project

URL: DELETE /api/projects/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN

Timesheet Endpoints
Get All Timesheets
URL: GET /api/timesheets
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Optional Query Parameters for Filtering: task_name, date, hours, user_id, project_id

Get Timesheet by ID
URL: GET /api/timesheets/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN

Create Timesheet
URL: POST /api/timesheets
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Body: JSON
{
    "task_name": "Task 1",
    "date": "2024-07-01",
    "hours": 8,
    "project_id": 1
}


Update Timesheet
URL: PUT /api/timesheets/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN
Body: JSON
{
    "task_name": "Task 1 Updated",
    "hours": 6
}


Delete Timesheet
URL: DELETE /api/timesheets/{id}
Headers: Authorization: Bearer YOUR_ACCESS_TOKEN








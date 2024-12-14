# User Management System

This project demonstrates a simple user management system with form submission, validation, and CRUD operations using **Vue.js**, **Inertia.js**, and **Laravel** as the backend framework.

## Features

- Add a new user.
- Edit an existing user.
- View the list of users.
- Validation for form fields.
- Perform CRUD operations on users.

## Tech Stack

- **Frontend**: Vue 3, Inertia.js, Bootstrap
- **Backend**: Laravel 8 (PHP)
- **Database**: MySQL
- **Styling**: Bootstrap 5

## Project Setup

### 1. Clone the repository

```bash
git clone <repository-url>
cd <repository-directory>


2. Install Backend Dependencies
In the Laravel project directory, install the required dependencies:

composer install

3. Install Frontend Dependencies
In the Vue.js project directory, install the required npm packages:


npm install
4. Set up the environment
Create a .env file in the root of the project and configure your database settings:


cp .env.example .env
Make sure to configure your .env file with correct database credentials and any other necessary environment variables.

5. Run Migrations
Run the database migrations to create the necessary tables:


php artisan migrate
6. Run Development Servers

php artisan serve
For Vite (Frontend):

npm run dev
This will start the Laravel backend server and the Vite development server.

7. Access the Application
The application will be available at http://localhost:8000. You can access the following pages:

User Form: http://localhost:8000/ for adding or editing a user.
Users List: http://localhost:8000/users to view the list of users.
How It Works
UserForm.vue:

The form is used for both adding new users and editing existing users.
On form submission, the data is sent to the backend using Inertia.js for AJAX-based submission.
The form has validation logic, and error messages are displayed in case of invalid inputs (e.g., missing name or email).
UserController:

The controller handles the logic for storing, updating, and fetching users.
The store() method handles the creation of a new user.
The update() method handles the updating of an existing user.
The index() method returns all users to be displayed.
Inertia.js:

The frontend and backend communicate seamlessly through Inertia.js.
The server returns views with the necessary data, and Inertia updates the page without full page reloads.
Form Validation:

If there are validation errors (such as missing name or email), they are passed to the frontend and displayed next to the respective fields.
CRUD Operations:

Create: Adding a new user via the POST /userscreate route.
Read: Viewing all users via the GET /users route.
Update: Editing a user via the PUT /users/{user} route.
Delete: Removing a user via the DELETE /users/{user} route.


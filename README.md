# Laravel Todo App

## Introduction

This is a **Laravel-based Todo App** built for managing personal tasks. The project leverages the **Laravel 12** framework for the backend and **Blade** for the frontend, using a simple and clean interface to allow users to create, edit, view, and delete tasks. Users can filter tasks based on status and label.

### Frameworks, Tools, and Technologies Used
- **Laravel 12**: Backend framework for handling requests, database management, and authentication.
- **Blade**: Templating engine used for building the frontend.
- **Tailwind CSS**: Utility-first CSS framework for styling the frontend.
- **MySQL**: Database for storing tasks and user data.
- **Breeze**: For user authentication, ensuring each user can manage their own to-do lists.

## Challenges & Solutions

During the development of this project, I encountered several challenges. Below are the challenges along with the solutions I implemented:

### 1. **User Authentication and Task Ownership**
   **Challenge**: Ensuring that each user could only access and manage their own tasks, and not the tasks of other users.
   **Solution**: 
   - I utilized Laravel's built-in **Breeze** system for user authentication. 
   - In every relevant controller method (e.g., `index()`, `store()`, `edit()`, `update()`, `destroy()`), I added a condition to check if the task belongs to the logged-in user by comparing the `user_id` of the task to `Auth::id()`.
   - This ensured that users could only view, edit, or delete their own tasks.

### 2. **Filtering and Sorting Tasks**
   **Challenge**: Implementing dynamic filtering of tasks by status and label and enabling sorting by due date.
   **Solution**: 
   - I added filtering functionality to the `TaskController` in the `index()` method by checking if `status` or `label` were set in the request. If they were, the query would be modified to include the respective filter using the `where()` method.
   - For sorting, I made sure to provide sorting by **due date** directly in the query builder, allowing tasks to be listed in ascending or descending order as needed.
   - In the Blade view, I included dropdowns for filtering and sorting, which dynamically updated the task list based on user selections.

### 3. **Form Validation and Error Handling**
   **Challenge**: Ensuring proper validation and handling of form errors during task creation and editing.
   **Solution**:
   - I used Laravel's built-in validation methods to validate incoming requests. For example, I validated that `title` was required and had a maximum length, while the `status` was constrained to specific values (`Pending`, `In_Progress`, `Completed`).
   - I added error handling in the Blade views to display error messages next to the relevant form fields. This was done using Laravel's `@error` directive to show validation error messages clearly to users.

### 4. **Responsive Design**
   **Challenge**: Making sure that the Todo app's interface was responsive and user-friendly on both desktop and mobile devices.
   **Solution**:
   - I utilized **Tailwind CSS** to make the UI responsive. By using its utility classes, I ensured that the layout adjusted properly for different screen sizes.
   - I also applied Tailwind’s `sm`, `md`, and `lg` breakpoints to adjust the layout for small, medium, and large screens. For example, I used flexbox utilities to stack or align items depending on the screen width.

### 5. **Task Sorting UI**
   **Challenge**: Sorting tasks by due date in the frontend UI and updating the view accordingly.
   **Solution**:
   - I added a simple dropdown for sorting tasks by due date. The user can select either "Sort by Due Date (Ascending)" or "Sort by Due Date (Descending)".
   - In the `index()` method of the `TaskController`, I modified the query to handle sorting based on the selected option. I added conditions to check if the sorting option was set in the request and adjusted the query accordingly.

### 6. **Managing Task Status Updates**
   **Challenge**: Updating the task status and ensuring the changes were reflected in both the UI and the database.
   **Solution**:
   - In the task update form, I included a dropdown to allow users to change the status of the task. This was tied to the task's `status` column in the database.
   - The status changes were validated and updated correctly in the database when the form was submitted. The view was then updated to reflect the new task status.

## Demo Video

Check out the demo video showcasing the functionality and features of the Todo app:
[Demo Video Link](https://youtu.be/tiPq4G7oiwM)

## Conclusion

Building this Laravel-based Todo app has been a rewarding experience. I’ve gained a deeper understanding of how to integrate Blade for the frontend with a Laravel backend, handle user authentication, and work with databases efficiently. The project taught me a lot about form validation, dynamic filtering, and creating responsive designs with Tailwind CSS.

The challenge also helped me improve my problem-solving skills when dealing with unexpected issues like managing relationships in the database, filtering data, and handling user input.

In conclusion, this was a great learning experience, and I am confident that I’ve grown as a developer by completing this project.

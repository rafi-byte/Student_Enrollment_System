#  Student Enrollment Web Application 

This web application streamlines the student enrollment process, providing both admin and student functionalities. It replaces traditional paper-based methods with a more efficient, digital approach. The system simplifies the entire process from application submission to approval, registration, and student management. Built with HTML, CSS, JavaScript, and PHP, and powered by a MySQL database, the application also supports secure data handling, session-based logins, and file exports.

   Table of Contents 
- [Features](#features)
- [Installation](#installation)
- [Database Schema](#database-schema)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [License](#license)

---

   Features 
1.  Admin Login System : Secure login for admins to manage students.
2.  Student Login System : Students can register, log in, and view/edit their profile.
3.  Student Enrollment : A streamlined form for enrolling new students.
4.  Admin Dashboard : Displays metrics and quick access to manage students.
5.  View & Manage Students : Admins can view, edit, or delete student records.
6.  Search Functionality : Search for students by name or email.
7.  Email Notification : Sends automatic emails to students after successful enrollment.
8.  Course Enrollment : Students can enroll in multiple courses.
9.  Export to CSV : Admins can export the list of students to a CSV file.
10.  File Upload : Students can upload documents (e.g., IDs or photos) during registration.
11.  Password Reset : Option for admins to reset their password via email.
12.  Activity Logs : Track admin actions such as student enrollments and updates.

---

   Installation 

 # Prerequisites
- [XAMPP](https://www.apachefriends.org/index.html) or any local server with Apache, PHP, and MySQL support.
- Basic knowledge of how to set up a local web server.

 # Steps

1.  Clone the repository :
   ```bash
   git clone https://github.com/rafi-byte/student-enrollment.git
   ```

2.  Move to the XAMPP `htdocs` directory :
   Copy the project folder to your `htdocs` directory inside XAMPP. For example:
   ```bash
   mv student-enrollment /xampp/htdocs/student-enrollment
   ```

3.  Start Apache and MySQL :
   Open XAMPP and start the Apache and MySQL services.

4.  Create the Database :
   - Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin) in your browser.
   - Create a new database called `student_enrollment`.
   - Import the SQL script provided in the project (`student_enrollment.sql`) to create the necessary tables.

5.  Configure Database Connection :
   - Open `db.php` and update the database connection parameters (host, username, password, and database name):
   ```php
   $host = 'localhost';
   $user = 'root';  
   $password = '';  
   $dbname = 'student_enrollment';
   ```

6.  Access the Application :
   - Visit [http://localhost/student-enrollment](http://localhost/student-enrollment) to access the application.

---

   Database Schema 

```sql
CREATE TABLE `admins` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);

CREATE TABLE `students` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20),
    `enrollment_date` DATE NOT NULL,
    `password` VARCHAR(255) NOT NULL
);

CREATE TABLE `courses` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `course_name` VARCHAR(100) NOT NULL,
    `student_id` INT(11),
    FOREIGN KEY (`student_id`) REFERENCES `students`(`id`) ON DELETE CASCADE
);
```

---

   Usage 

 #  Admin 
-  Login : Admins can log in using their credentials on the `login.php` page.
-  Dashboard : After logging in, the admin can view the dashboard (`admin_dashboard.php`) for quick metrics.
-  View/Manage Students : Admins can view, edit, and delete student records via the `view_students.php` page.
-  Add Student : Admins can manually add new students using the `enroll.php` page.
-  Export Students : Use the `export_csv.php` to export the student list to a CSV file.

 #  Student 
-  Register : New students can sign up using the `student_register.php` page.
-  Login : Students can log in using their credentials via `student_login.php`.
-  View/Edit Profile : After logging in, students can update their profile in `student_profile.php`.

---

   Project Structure 

```plaintext
student-enrollment/
├── db.php                      # Database connection
├── login.php                   # Admin login page
├── logout.php                  # Admin logout page
├── enroll.php                  # Student enrollment form
├── view_students.php           # View all students
├── edit_student.php            # Edit student information
├── delete_student.php          # Delete student record
├── admin_dashboard.php         # Admin dashboard
├── student_register.php        # Student registration
├── student_login.php           # Student login
├── student_profile.php         # Student profile management
├── export_csv.php              # Export student data to CSV
├── reset_password.php          # Admin password reset
├── activity_log.php            # Admin activity logs
├── course_enroll.php           # Course enrollment page
├── notification.php            # Email notifications
├── uploads/                    # Uploaded files
├── style.css                   # Stylesheet for the application
└── README.md                   # This file
```

---

   Technologies Used 
-  Frontend : HTML, CSS, JavaScript
-  Backend : PHP
-  Database : MySQL
-  Local Server : XAMPP
-  Email : PHP's `mail()` function for notifications

---

   Contributing 
Contributions are welcome! If you'd like to contribute, please follow these steps:
1. Fork the project.
2. Create your feature branch: `git checkout -b feature/YourFeature`.
3. Commit your changes: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin feature/YourFeature`.
5. Open a pull request.

---

   License 
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

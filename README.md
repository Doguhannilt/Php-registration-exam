# Student Registration Form with PHP

## Introduction
This project aims to enhance students' skills in creating a user registration form using PHP and MySQL, processing form data, saving data to the database, and retrieving data from the database.

## Task Details
1. **Form Design:**
   - Create an HTML form to allow users to input the following information:
     - First Name
     - Last Name
     - Email Address
     - Password
     - Date of Birth
     - Gender
   - Implement basic form validations (e.g., empty field check, email format validation, password length) using JavaScript.

2. **Processing Form Data with PHP:**
   - Retrieve form data using PHP.
   - Implement server-side validations using PHP (e.g., check if email is unique, match password and confirm password fields).

3. **Database Operations:**
   - Create a MySQL database.
   - Design an appropriate table to store user information.
   - Connect to the database using PHP PDO or MySQLi.
   - Insert form data into the database.

4. **Data Display:**
   - Create a page to list registered users from the database.
   - Display basic user information (e.g., name, email) on this page.

## Evaluation Criteria:
- Proper and user-friendly form design.
- Correct processing and validation of form data using PHP.
- Secure storage of data in the database with proper connection handling.
- Safe and secure display of users' information.
- Clean, readable, and well-documented code.


## Technologies Used
- HTML, CSS for front-end development.
- PHP for server-side scripting.

## Repository Structure
- `index.php`: Main registration form page.
- `user_list.php`: Page to display the list of registered users.
- `config.php`: Database configuration file.
- `database.sql`: SQL file for database structure.
- `assets/`: Folder for CSS and JavaScript files.
- `docs/`: Documentation folder containing README and other relevant files.


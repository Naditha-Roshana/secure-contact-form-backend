🛡️ Secure Contact Form Backend

A secure PHP-based contact form system with an authenticated admin panel for managing submitted messages.

This project demonstrates backend form handling, database integration, and session-based authentication using PHP and MySQL.

📌 Project Description

Secure Contact Form Backend is a mini full-stack web application that allows users to submit contact messages through a modern UI while enabling administrators to securely view those messages via a protected admin dashboard.

The system focuses on:

Backend security

Clean database structure

Session-based authentication

SQL injection prevention

✨ Features

📩 Modern contact form UI

✅ Server-side form validation

🛡️ SQL injection protection using PDO prepared statements

🗄️ MySQL database integration

👑 Secure admin login system

🔐 Session-based admin access control

🚪 Logout functionality

📊 Admin dashboard to view submitted messages in real time

🛠️ Tech Stack

Frontend: HTML5, CSS3

Backend: PHP (PDO)

Database: MySQL

Authentication: PHP Sessions

Version Control: Git & GitHub

⚙️ Installation & Setup
1️⃣ Clone the repository
git clone https://github.com/your-username/secure-contact-form-backend.git

2️⃣ Move project to your server directory

If using XAMPP:

htdocs/secure-contact-form-backend

3️⃣ Create Database

Create a database named:

contact_messages

4️⃣ Create Table
CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

5️⃣ Configure Database Credentials

Inside submit.php and admin.php, update:

$host = "localhost";
$dbname = "contact_messages";
$username = "root";
$password = "your_password";

6️⃣ Run the Project

Open in browser:

http://localhost/secure-contact-form-backend

## 📸 Screenshots

### 📨 Contact Form UI
Clean and modern contact form interface for users to submit inquiries.

![Contact Form UI](screenshots/contact-form-ui.png)

---

### ✅ Successful Message Submission
Confirmation message shown after successful form submission.

![Success Message](screenshots/success-message.png)

---

### 👑 Admin Panel – View Messages
Private admin panel to view all received contact messages in real time.

![Admin Panel](screenshots/admin-panel.png)

---

🔐 Security Implementation

The application implements the following security measures:

    💠 Server-side form validation

    💠 PDO prepared statements to prevent SQL injection

    💠 Session-based access control for the admin panel

    💠 Restricted direct URL access to admin routes

Note: This project uses demo credentials for development purposes.
In production, password hashing and database-stored user authentication are recommended.
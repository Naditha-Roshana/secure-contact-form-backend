# 🛡️ Secure Contact Form Backend

A secure PHP-based contact form system with an authenticated admin panel for managing submitted messages.

---

## 📌 Project Description

Secure Contact Form Backend is a mini full-stack web application that allows users to submit contact messages through a modern UI while enabling administrators to securely view those messages via a protected dashboard.

This project focuses on backend security, database handling, and session-based authentication using PHP and MySQL.

---

## ✨ Features

- 📨 Modern contact form interface
- ✅ Server-side form validation
- 🛡️ SQL injection protection using PDO prepared statements
- 🗄️ MySQL database integration
- 👑 Secure admin login system
- 🔐 Session-based access control
- 🚪 Logout functionality
- 📊 Real-time message viewing dashboard

---

## 🛠️ Tech Stack

- **Frontend:** HTML5, CSS3
- **Backend:** PHP (PDO)
- **Database:** MySQL
- **Authentication:** PHP Sessions
- **Version Control:** Git & GitHub

---


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

```bash
git clone https://github.com/your-username/secure-contact-form-backend.git
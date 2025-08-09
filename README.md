# Expense Tracker (CodeIgniter 4 + Bootstrap)

A simple **Expense Tracking Web App** built with **CodeIgniter 4**, **MySQL**, and **Bootstrap**.  
Features include **User Registration**, **Login/Logout**, and a basic **Expense Dashboard**.

---

## 🚀 Features
- User Sign Up & Login (password hashing for security)
- Session-based authentication
- Add, edit, delete, and view expenses
- Bootstrap UI for clean, responsive design
- MySQL database with `phpMyAdmin` support

---

## 📂 Project Structure
app/
Controllers/ # Auth, Home, Expense controllers
Models/ # UserModel, ExpenseModel
Views/ # auth views, expense views, templates
public/
css/bootstrap.min.css

## 🛠 Requirements
- PHP 7.4+  
- MySQL / MariaDB  
- Composer  
- Apache / Nginx  
- phpMyAdmin (optional, for DB management)

  
## Database Information
- database.default.hostname = localhost
- database.default.database = expense_tracker
- database.default.username = root
- database.default.password =
- database.default.DBDriver = MySQLi

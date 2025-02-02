# BiBilet

BiBilet is a PHP-based ticketing system that allows users to view bus schedules and purchase tickets.

## 📌 About the Project
This project is a ticket reservation system developed using PHP and PostgreSQL. Users can **view schedules**, **purchase tickets**, and **manage their account information**.

## 🚀 Features
- 🚌 View schedules
- 🎟️ Purchase tickets
- 🔐 User login and registration
- 📊 User account management

## 🛠️ Technologies Used
- **PHP** – Backend development
- **PostgreSQL** – Database management
- **Bootstrap & CSS** – UI design

## 📂 Project Structure
```
📁 Web Proje
│── 📄 index.php         # Home page
│── 📄 baglanti.php      # Database connection
│── 📄 seferler.php      # View schedules
│── 📄 bilet.php         # Ticket purchase page
│── 📄 hesabim.php       # User account
│── 📄 delete_user.php   # User deletion
│── 📄 delete_sefer.php  # Schedule deletion
│── 📁 css/             # Stylesheets
│── 📁 fonts/           # Font files
```

## 🏗️ Installation
### 1️⃣ Install Required Dependencies
To run this project, you need:
- PHP 7.x or higher
- PostgreSQL database

### 2️⃣ Create the Database
Run the following commands in the terminal to create the PostgreSQL database:
```sh
psql -U postgres
CREATE DATABASE proje;
```
Then, update the database credentials in `baglanti.php`.

### 3️⃣ Run the Project
You can use PHP’s built-in server to run the project:
```sh
php -S localhost:8000
```
Then, open `http://localhost:8000` in your browser to access the project.

## 📷 Screenshot
![BiBilet Home Page](./screenshot.png)

## 💡 Contributing
If you have any suggestions or improvements, feel free to open a **pull request** or create an **issue**. 🚀

---
**📌 Note:** This is a basic ticketing system and open for improvements. Adding encryption and SQL security to the authentication process is highly recommended.


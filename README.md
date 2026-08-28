# 🎬 Cinema — Movie Management System

> **Discover great stories. Manage your cinema.**

A Laravel-based Cinema Management System with a public movie catalog, admin dashboard, movie CRUD operations, image uploads, authentication, and a RESTful API.

## 📸 Screenshots

### 🏠 Public Home / Movies

![Public Movies](screenshots/publicMovies1.png)

![Public Movies](screenshots/publicMovies2.png)

### 🎬 Public Movie Details

![Public Movie Details](screenshots/showPublicMovie.png)

### 📱 Mobile View

![Mobile Home](screenshots/HomeMobileView.png)

### 🔐 Admin Authentication

![Admin Login](screenshots/login.png)

![Admin Signup](screenshots/signup.png)

### 📊 Admin Dashboard

![Admin Dashboard](screenshots/dashboard1.png)

![Admin Dashboard](screenshots/dashboard2.png)

### 🎥 Movie Management

![Admin Movies](screenshots/adminMovies.png)

![Add Movie](screenshots/add.png)

![Edit Movie](screenshots/edit.png)

![Admin Movie Details](screenshots/showAdminMovie.png)


## ✨ Features

### 🎥 Public Side
- Browse all movies
- View movie details
- Responsive movie cards
- Movie posters, ratings, and release years
- Cinematic responsive design

### 🔐 Admin Panel
- Admin Sign Up / Sign In
- Admin dashboard
- Create, view, edit, and delete movies
- Upload and replace movie posters
- Automatic cleanup of old poster files
- Form Request validation

### 🌐 REST API
- Full Movie CRUD API
- Image upload support
- JSON responses
- Validation and success messages
- Tested with Postman


## 🛠️ Built With

- **Laravel**
- **PHP**
- **MySQL**
- **Blade**
- **Bootstrap**
- **CSS**
- **JavaScript**
- **Laravel Sanctum**
- **Vite**
- **Postman**

## 🏗️ Project Structure

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   ├── Api/
│   │   └── HomeController.php
│   │
│   └── Requests/
│       ├── StoreMovieRequest.php
│       └── UpdateMovieRequest.php
│
├── Models/
│   ├── Movie.php
│   └── User.php

resources/
├── css/
│   └── app.css
├── js/
│   └── app.js
└── views/
    ├── layouts/
    ├── admin/
    ├── auth/
    └── home/

routes/
├── web.php
└── api.php
```

## 🎯 Main Concepts

This project demonstrates:

- Laravel MVC architecture
- Eloquent ORM
- CRUD operations
- Form Request validation
- Authentication
- File storage and image handling
- RESTful APIs
- Blade layouts
- Bootstrap responsive design
- Custom CSS design system


## 🚀 Installation

```bash
git clone <repository-url>
cd Cinema
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve

In another terminal:

```bash
npm run dev


## 🌐 API Endpoints

| Method | Endpoint | Action |
|---|---|---|
| GET | `/api/movies` | Get all movies |
| POST | `/api/movies` | Create movie |
| GET | `/api/movies/{movie}` | Get movie |
| PUT/PATCH | `/api/movies/{movie}` | Update movie |
| DELETE | `/api/movies/{movie}` | Delete movie |


## 📌 Status

**Completed** — The Cinema Management System includes a public movie catalog, movie details, admin authentication, full movie CRUD, image management, and a RESTful Movie API.

---

### 🎬 Cinema

Built with Laravel to practice and demonstrate modern web development concepts through a complete cinema management experience.

## 👤 Author

**Ammar Elshafey**
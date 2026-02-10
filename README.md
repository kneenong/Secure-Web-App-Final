## 🔄 Progress Checkpoint 1 – Initial Build (Feb 4, 2026)

### ✅ Features Working
- Laravel project setup
- Login and registration (Laravel Breeze)
- Password hashing (Laravel default)
- Basic routing
- Authentication middleware

### 🔧 In Progress
- Role-based access (Admin/User)
- Protected admin routes
- Admin dashboard features
- UI polishing

### 👥 Task Distribution
- Cempron: Project setup, dashboard layout
- De Gracia: UI styling, Project setup 
- Racho: Route setup, authentication scaffolding, login/register pages

## 🔐 Progress Checkpoint 2 – Security Features (Feb 9, 2026)

### ✅ Completed Security Features
- Password hashing using bcrypt / Argon2 (Laravel default)
- Authentication middleware protecting routes
- Role-based access control (Admin / User)
- Protected admin routes (cannot be accessed via URL)

### 🔧 In Progress
- Admin activity monitoring
- UI improvements for dashboards

### 🛡️ Security Explanation
Passwords are hashed automatically during registration using Laravel’s hashing system.  
Routes are protected using middleware such as `auth` and custom role checks to ensure unauthorized users cannot access restricted pages.

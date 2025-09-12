# Automate - School Management System

**Version:** 1.0.0

## 📖 Overview

Automate is a robust, web-based School Management System developed using PHP and MySQL. It simplifies the administration of educational institutions by providing an intuitive platform for managing students, teachers, academic records, and institutional settings. The system features role-based access control, ensuring secure and efficient operations for all users.

## ✨ Features

### Core Functionality
- **User Management**: Comprehensive profiles for students, teachers, and administrative staff
- **Academic Management**: Handle grades, sections, subjects, and class assignments
- **Grade Tracking**: Detailed score management with semester and year tracking
- **Student Records**: Complete student information including personal details and parent contacts
- **Teacher Assignments**: Assign teachers to specific classes and subjects
- **Registrar Functions**: Streamlined student registration and record management

### User Roles
- **👨‍💼 Admin**: Full system control - manage users, configure settings, oversee all operations
- **👨‍🏫 Teacher**: Access assigned classes, input grades, update student scores
- **👨‍🎓 Student**: View personal academic records and grades
- **📋 Registrar Office**: Handle student admissions and academic documentation

### Technical Features
- **Secure Login**: Password-protected authentication with role-based permissions
- **Responsive UI**: Bootstrap-powered interface compatible with all devices
- **Database-Driven**: MySQL backend for reliable data storage and retrieval
- **Contact System**: Built-in messaging for inquiries and support

## 🛠️ Technology Stack

- **Backend**: PHP 7+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework**: Bootstrap 5
- **Server**: Apache/Nginx (recommended)

## 🚀 Installation

1. **Clone Repository**
   ```bash
   git clone https://github.com/yourusername/automate-sms.git
   cd automate-sms
   ```

2. **Database Setup**
   - Create a new MySQL database
   - Import `sms_db.sql` to set up tables and sample data

3. **Configuration**
   - Update database credentials in `DB_connection.php`
   - Ensure PHP and MySQL are properly installed

4. **Web Server**
   - Deploy to Apache/Nginx with PHP support
   - Access via browser at your server URL

## 📋 Usage Guide

1. **Access System**: Navigate to the home page and click "Login"
2. **Authentication**: Enter credentials based on your assigned role
3. **Dashboard Navigation**: Use role-specific dashboards to perform tasks
4. **Common Operations**:
   - Admins: Add/edit users, manage academic structure
   - Teachers: View classes, input student grades
   - Students: Check grades and academic progress
   - Registrar: Process student registrations

## 🗄️ Database Schema

The system utilizes these primary database tables:

| Table | Purpose |
|-------|---------|
| `admin` | System administrators |
| `teachers` | Faculty member profiles |
| `students` | Student information and records |
| `registrar_office` | Administrative staff |
| `grades` | Academic grade levels |
| `section` | Class sections (A, B, C, etc.) |
| `class` | Grade-section combinations |
| `subjects` | Course curriculum |
| `student_score` | Academic performance data |
| `setting` | System configuration |
| `message` | Contact form submissions |




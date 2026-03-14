# Medical Information System (MIS)

[![PHP](https://img.shields.io/badge/PHP-7.4+-blue.svg?logo=php&logoColor=white)](https://php.net)
[![Yii2](https://img.shields.io/badge/Yii2-2.0+-green.svg?logo=yiiframework&logoColor=white)](https://www.yiiframework.com/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange.svg?logo=mysql&logoColor=white)](https://mysql.com)

**Medical Information System** is a full-stack web application designed to automate healthcare facility workflows, including patient management, physician scheduling, and medical service orchestration.

---

## 🚀 Key Features

### **Healthcare Management**
- **Patient Records:** Comprehensive database for managing demographic information and medical history.
- **Physician Directory:** Tracking medical staff, specialties, and professional roles.
- **Service Catalog:** Dynamic management of medical procedures and pricing.
- **Referral System:** Automated generation and tracking of medical referrals.

### **Enterprise Security**
- **RBAC (Role-Based Access Control):** Granular permission management for different user tiers.
- **Authentication:** Secure registration and multi-factor login protocols.
- **Soft Delete:** Logical data deletion ensures audit trails and prevents accidental data loss.

### **UX & Reliability**
- **Full CRUD Support:** Standardized operations for all clinical entities.
- **Advanced Filtering:** High-speed search and multi-parameter filtering for large datasets.
- **Pagination & Optimization:** Smooth navigation through extensive medical records.

---

## 🏗️ Architecture

The system is built on the **MVC (Model-View-Controller)** pattern using the **Yii2 Framework**, ensuring a strict separation of concerns:

```text
MIS-Structure/
├── Models/        # Domain entities, validation rules, and business logic
├── Views/         # UI templates (rendered via Twig for enhanced security)
├── Controllers/   # Request orchestration and data flow handling
└── Database/      # Migrations, seeding scripts, and relational mapping
```

---

## 🛠️ Technology Stack

- **Backend:** PHP 7.4+ with **Yii2 Professional Framework**
- **Database:** **MySQL 8.0** with relational integrity constraints
- **Templating:** **Twig** (Template engine for PHP)
- **Security:** Yii2 built-in RBAC and CSRF protection
- **Deployment:** Composer-based dependency management

---

## 🧬 Database Schema & Relations

The relational model is optimized for high data integrity:

- **Patients & Doctors:** Core demographic entities.
- **Direction List:** Acts as a junction entity linking patients to specific clinical events.
- **Direction-Services (Many-to-Many):** Handles complex scenarios where one referral includes multiple medical services.

**Key Associations:**
- `Referral` → `Patient` (**Many-to-One**)
- `Referral` → `Doctor` (**Many-to-One**)
- `Referral` ↔ `Services` (**Many-to-Many** via junction table)

---

## 🛡️ Security Implementation

- **Data Validation:** Strict type-checking and validation at the Model layer.
- **SQLi Protection:** Full implementation of **ActiveRecord** to prevent SQL injection.
- **XSS Prevention:** Automatic output escaping integrated into Twig templates.
- **CSRF Defense:** Mandatory token validation for all state-changing requests.

---

## ⚙️ Installation & Deployment

### Prerequisites
- PHP 7.4 or higher
- Composer
- MySQL 8.0+

### Setup
1. **Clone and Install:**
   ```bash
   composer install
   ```
2. **Database Configuration:**
   Configure your MySQL credentials in `config/db.php`.
3. **Run Migrations:**
   ```bash
   php yii migrate
   ```
4. **Launch Server:**
   ```bash
   php yii serve
   ```
*System will be available at `http://localhost:8080`.*

---

## 📈 Development Standards

- **Coding Standard:** Adherence to **PSR-12** for consistent code style.
- **Documentation:** Extensively documented using **PHPDoc** for automated API generation.
- **Version Control:** Structured database evolution using Yii2 Migration System.

---
*Developed as part of a technical internship to demonstrate full-stack engineering proficiency in PHP/Yii2 environments.*

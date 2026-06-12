# PharmaFEFO-Application-d-Optimisation-des-Stocks-et-Alerte-P-remption

## Overview

PharmaFEFO is a web application designed to optimize pharmaceutical stock management using the **FEFO (First Expired, First Out)** principle.

The system helps pharmacies and healthcare facilities manage products, batches, stock movements, expiration alerts, notifications, reports, and users while reducing losses caused by expired medications.

---

## Features

### Authentication & Authorization

* User login/logout
* Session management
* Role-based access control
* Supported roles:

  * ADMIN
  * PHARMACIEN
  * PREPARATEUR

---

### Product Management

* Add products
* Edit products
* Delete products
* View product list

---

### Batch Management

Each product can contain multiple batches.

Batch information includes:

* Batch number
* Quantity available
* Expiration date
* Associated product

Features:

* Create batch
* Update batch
* Delete batch
* FEFO tracking

---

### Stock Movements

The application records all stock operations:

#### IN

Used when new stock enters the pharmacy.

#### OUT

Used when products are dispensed.

The system automatically selects the batch with the nearest expiration date according to the FEFO principle.

#### RETURN

Used when products are returned.

---

### FEFO Principle

The system follows the FEFO method:

**First Expired, First Out**

When a stock output occurs:

1. The application searches available batches.
2. Batches are sorted by expiration date.
3. The batch expiring first is selected automatically.
4. Quantity is updated.

This minimizes pharmaceutical waste and ensures better stock rotation.

---

### Notifications

Automatic alerts are generated for:

* Expired batches
* Batches expiring soon

This allows pharmacy staff to take action before products become unusable.

---

### Reports

The application provides several reports:

#### Expired Products Report

Displays all expired batches.

#### Expiring Soon Report

Displays batches approaching expiration.

#### Stock Report

Displays current stock levels.

#### Stock Movements Report

Displays all stock transactions.

---

### Dashboard

The dashboard provides real-time statistics:

* Total products
* Total batches
* Expired products
* Expiring soon products
* Notifications count
* Stock movements count

---

### User Management

Administrators can:

* Create users
* Edit users
* Delete users
* Assign roles

---

## Technologies Used

### Backend

* PHP 8
* PDO
* MVC Architecture

### Frontend

* HTML5
* Tailwind CSS
* Font Awesome

### Database

* MySQL

---

## Database Tables

### users

Stores application users.

### roles

Stores user roles.

### products

Stores pharmaceutical products.

### batches

Stores product batches and expiration dates.

### stock_movements

Stores stock transactions.

---

## Project Structure

```text
src/
│
├── Controllers/
├── Repository/
├── Middleware/
├── Services/
├── Entities/
│
views/
│
├── auth/
├── dashboard/
│
public/
│
index.php
```

---

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-repository/pharmafefo.git
```

### 2. Create database

Create a MySQL database:

```sql
CREATE DATABASE pharmafefo;
```

### 3. Import SQL script

Import the provided database script.

### 4. Configure database connection

Update database credentials in:

```php
config/database.php
```

### 5. Run application

Place the project inside:

```text
htdocs/
```

Start:

* Apache
* MySQL

Then open:

```text
http://localhost/pharmafefo
```

---

## Author

Developed as an academic project for pharmaceutical stock optimization using the FEFO methodology.

---

## License

This project is intended for educational purposes.

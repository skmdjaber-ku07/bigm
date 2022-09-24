## Installation

+ Server Requirements: PHP 8.1.6 or higher, MySQL 5.1+
+ Download the (https://github.com/skmdjaber-ku07/bigm/archive/master.zip) package from Github.
  Or clone the repo: git clone https://github.com/skmdjaber-ku07/bigm.git
+ Update composer packages: composer update
+ Create .env file and configure database information.
+ Migrate and seed sample data into DB: php artisan migrate:fresh --seed
  Or Import initial data into the Database: /database/bigm_app_db.sql
+ Admin login credentials: email: admin@gmail.com, password: secret

## DB Design

+ users          : id, name, email, password, type (admin, applicant)
+ applicants     : user_id, language, division, district, upazila, address_details, photo, cv, training
+ exams          : id, name, level (school, college, university)
+ universities   : id, name
+ boards         : id, name
+ applicant_exam : applicant_id, exam_id, institute_type (board, university), institute_id, result
+ trainings      : id, applicant_id, name, details

## Model

+ User
+ Applicant
+ Exam
+ University
+ Board
+ Training

## Route & Middleware

admin: Only users.type == 'admin' are allowed

## Controller

+ Admin\AdminApplicantController : index, data, edit, update

## Views
+ admin : applicants
+ layouts : app.blade.php

## Library

+ App\Library\BdGeo : division, district, upazila mapping array & collections generator.

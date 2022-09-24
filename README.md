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

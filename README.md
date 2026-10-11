# Smart Blood Donor Finder System
PHP + MySQL web application based on the supplied diagrams, with a Python matching demo.

## Features
Patient/donor registration and login; donor profile and availability; blood-group/location search; requests with Pending, Accepted, Rejected, Donation_Marked, Confirmed statuses; donation verification code; review/rating; notifications.
## Requirements
PHP 8.1+ (`pdo_mysql`), MySQL 8+/MariaDB, Apache/XAMPP. Python 3.9+ is optional for `tools/matching_demo.py`.
## XAMPP setup
1. Extract this folder into `htdocs`.
2. Start Apache and MySQL.
3. Import `database/schema.sql` using phpMyAdmin.
4. Check credentials in `config.php` (defaults: root, blank password).
5. Visit `http://localhost/Smart_Blood_Donor_Finder_System/`.
6. Register a patient and a donor to test both roles.
## Notes
Educational MVP, not for clinical decisions. Eligibility is self-reported, not medical screening. Demo verification code is shown to the donor after marking donation; production should deliver it privately through a verified channel. Email/SMS is represented by in-app notifications.

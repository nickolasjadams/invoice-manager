#!/bin/bash

read -p 'Email: ' email
read -p 'First Name: ' first_name
read -p 'Last Name: ' last_name
read -p 'Company Name: ' company_name
read -sp 'Password: ' password && echo ''
password=$(php -f database/hash_password.php "$password")
read -p 'MYSQL User: ' mysql_user
read -p 'Database Name : ' db

mysql -u "$mysql_user" -e "\
use $db; \
INSERT INTO users \
    (email, first_name, last_name, company_name, password, admin)\
VALUES\
    (\"$email\", \"$first_name\", \"$last_name\", \"$company_name\", \"$password\", true);"
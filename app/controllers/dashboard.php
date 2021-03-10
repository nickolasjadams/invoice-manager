<?php

use App\Models\User;

echo 'Dashboard';

$users = User::all();

var_dump($users);
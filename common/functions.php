<?php

function encrypt_password($password) {
	return password_hash($password, PASSWORD_DEFAULT);
}

function checkRole($role) {
    if (strpos($_SESSION["roles"], $role)) {
        return true;
    }
    return false;
}
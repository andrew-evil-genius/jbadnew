<?php

function encrypt_password($password) {
	return password_hash($password, PASSWORD_DEFAULT);
}

function checkRole($role) {
    $roles = array_key_exists("roles", $_SESSION) ? $_SESSION["roles"] : "";
    if (strpos($roles, $role) > -1) {
        return true;
    }
    return false;
}
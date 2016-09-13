<?php
session_start();
require_once 'functions_debug.php';
function pageController() {
    clearSession();
    redirect("login_debug_exercise.php");
}
pageController();
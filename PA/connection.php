<?php

$conn = mysqli_connect("localhost", "root", "", "chiberto");

if (!$conn) {
    echo "Error: " . mysqli_connect_error();
    exit();
}

<?php
session_start();

if (isset($_SESSION['count'])) {
  $_SESSION['count'] = $_SESSION['count'] + 1;
} else {
  $_SESSION['count'] = 1;
}

// var_dump($_SESSION['count']);
// var_dump($_SESSION['']);

echo "あなたが見たページの回数は" . $_SESSION['count'] . "回です";
unset($_SESSION['count']);

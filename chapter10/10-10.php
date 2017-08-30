<?php
session_start();

if (isset($_SESSION['count'])) {
  $_SESSION['count'] = $_SESSION['count'] + 1;
} else {
  $_SESSION['count'] = 1;
}

echo "あなたが見たページの回数は" . $_SESSION['count'] . "回です";

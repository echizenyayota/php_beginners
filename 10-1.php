<?php

$value = "banana";
setcookie("userid", $value);

// 個々のクッキーを表示します
// echo $_COOKIE["userid"];

// デバッグ／テスト用には、全てのクッキーを見る方法があります。
// print_r($_COOKIE);

$d = new DateTime("2017-08-30 16:05:00");
var_dump($d);
setcookie("userid", "", $d->format('U'));
echo $_COOKIE["userid"];

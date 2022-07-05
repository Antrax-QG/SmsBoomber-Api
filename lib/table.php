<?php
// یک بار صفحه اجرا شود
include '../config.php';
//========================== // table creator // ==============================
$connect->multi_query("CREATE TABLE `user` (
    `id` int PRIMARY KEY,
	`step` varchar(150) DEFAULT NULL,
	`member` int DEFAULT '0',
	`coin` int DEFAULT '0'
    ) default charset = utf8mb4;
	CREATE TABLE `file` (
    `id` int PRIMARY KEY,
	`file` varchar(255) NOT NULL,
	`photo` varchar(255) NOT NULL,
	`caption` text NOT NULL,
	`like` int DEFAULT '0',
	`limit` int NOT NULL,
	`download` int DEFAULT '0'
    ) default charset = utf8mb4;
    CREATE TABLE `download` (
    `id` int NOT NULL,
	`file` int NOT NULL
	) default charset = utf8mb4;
	CREATE TABLE `like` (
    `id` int NOT NULL,
	`file` int NOT NULL
    ) default charset = utf8mb4; 
    CREATE TABLE `sendfile` (
	`data` text DEFAULT NULL
    ) default charset = utf8mb4; 
	CREATE TABLE `block` (
    `id` int NOT NULL
    ) default charset = utf8mb4; 	
    CREATE TABLE `daily` (
    `time` varchar(50) DEFAULT '',
    `user` int DEFAULT '0'
    ) default charset = utf8mb4;
    CREATE TABLE `sendall` (
  	`step` varchar(20) DEFAULT NULL,
	`text` text DEFAULT NULL,
	`chat` varchar(100) DEFAULT NULL,
	`user` int DEFAULT '0'
    ) default charset = utf8mb4;
    INSERT INTO `sendall` () VALUES ();
    INSERT INTO `daily` () VALUES ();
	INSERT INTO `sendfile` () VALUES ();");
//========================== // Check connection // ==============================
//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 
if ($connect->connect_error) {
   die("خطا در ارتصال به خاطره :" . $connect->connect_error);
}
  echo "دیتابیس متصل و نصب شد ."
?>
<?php
$db = parse_url(getenv("host=ec2-52-200-155-213.compute-1.amazonaws.com;port=5432;user=jxfpzqqmboccjr;password=193dcc4b2bc8d7048a65e63b33a6e66fd39151f9810fd29083b9f7d020694480;dbname=d2ulfua00e8ep4"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=ec2-52-200-155-213.compute-1.amazonaws.com;port=5432;user=jxfpzqqmboccjr;password=193dcc4b2bc8d7048a65e63b33a6e66fd39151f9810fd29083b9f7d020694480;dbname=d2ulfua00e8ep4",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));

echo("connection successful");
$title = $_POST["Title"];
$description = $_POST["Description"];
$materials = $_POST["Materials"];
$filename = $_POST["Filename"];

$sql = $pdo->prepare("INSERT INTO ideainfo (title, description, materials, filename) VALUES (:title, :description, :materials, :filename)");
$sql->execute(['title' => $title, 'description' => $description, 'materials' => $materials, 'filename' => $filename]);
echo("insertation successful")

?>
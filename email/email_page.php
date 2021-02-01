<?php 
include('class_lib.php');
$database_con = new DB_con();
$getData = new dbData();

$name = "Blaise";
$_SESSION['p_test'] = '<html>
<head>
<title>
A Simple HTML Document
</title>
</head>
<body>
<p style="color: red; font-weight: bold;">This is a very simple HTML document</p>
<p>It only has two paragraphs</p>
<p>Hello '.$name.'</p>
</body>
</html>';

echo $_SESSION['p_test'];
?>
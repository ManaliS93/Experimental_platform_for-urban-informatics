<?php

$item1 = $_REQUEST['test'];
//echo $item1;
exec("javac -cp ./java-json;. Client.java");
exec("java -cp ./java-json;. Client $item1", $output);				
print_r($output);



?>
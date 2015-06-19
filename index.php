<h1> Request #
<?php 
$link = mysqli_connect($_ENV["DBHOST"],$_ENV["DBUSER"],$_ENV["DBPASS"],$_ENV["DB"]) or die("Error " . mysqli_error($link)); 

$query = "update mytable set qtd=qtd+1";
$result = mysqli_query($link, $query);

$query = "SELECT qtd FROM mytable" or die("Error in the consult.." . mysqli_error($link)); 
$result = mysqli_query($link, $query); 

while($row = mysqli_fetch_array($result)) { 
  echo $row["qtd"] . "<br>"; 
} 
?>
<br>
Visit #
<?php
$m = new Memcached();
$m->addServer($_ENV["MEMHOST"], $_ENV["MEMPORT"]);
$m->setOption(Memcached::OPT_BINARY_PROTOCOL,true);

$m->add('counter', 0, 10);
$visit = $m->increment('counter',1);
$m->touch('counter',10);

echo $visit;
?>

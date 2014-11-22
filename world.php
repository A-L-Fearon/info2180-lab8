<?php
mysql_connect(
"localhost",
"afearon"
);
mysql_select_db("world");

$ALL = $_REQUEST['all'];
$LOOKUP = $_REQUEST['lookup'];
$OUTPUT = $_REQUEST['format']

$results = mysql_query("SELECT * FROM countries WHERE name LIKE '%$LOOKUP%';");

if($ALL == "true"){
  $results = mysql_query("SELECT * FROM countries;");
  
}else{
  $results = "";
}

print $results;


while ($row = mysql_fetch_array($results)) {
  ?>
  <li> <?php echo $row["name"]; ?>, ruled by <?php echo $row["head_of_state"]; ?> </li>
  <?php
}
?>

<?php
while ($row = mysql_fetch_array($results)) {
    if ($OUTPUT == "xml") {
        print "<countrydata>";
        print "<country>";
        print "<name>" . $row['name'] . "</name>";
        print "<ruler>" . $row['head_of_state'] . "</ruler>";
        print "</country>";
        print "</countrydata>";
    } else {
        print "<li>" . $row["name"] . ", ruled by " . $row["head_of_state"] . "</li>";
    }
}

?>






<?php
$rootPw = getenv('MYSQL_ENV_MYSQL_ROOT_PASSWORD');
$tcpAddr = getenv('MYSQL_PORT_3306_TCP_ADDR');
$tcpPort = getenv('MYSQL_PORT_3306_TCP_PORT');
$link = mysql_connect("$tcpAddr:$tcpPort", 'root', $rootPw);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully to MySQL instance';
echo nl2br("\n We are connected to the DB container using DB host: $tcpAddr with TCP port $tcpPort.");
mysql_select_db("testdb1",$link) or die ("\n Could not open testdb1 database".mysql_error());
$query="SELECT * FROM events";
$results = mysql_query($query);
echo nl2br("\n Some data from the test database, testdb1 (make sure you ran the extra docker exec command that creates the db and test data to see this): \n");
while ($row = mysql_fetch_array($results)) {
    echo '<tr>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}
mysql_close($link);
?>

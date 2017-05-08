<?php
require_once "../connectDB_func/connect.php";
require_once "../connectDB_func/get-set.inc.php";
require_once "../class/Member.class.php";

echo "<table border='1' class='table'>";

foreach (DB_getAllMember() as $member)
{
    echo "<tr>";
    echo "<td>".$member->getElement('id')."</td>";
    echo "<td>".$member->getElement('username')."</td>";
    echo "<td>".$member->getElement('password')."</td>";
    echo "</tr>";
}
echo "</table>";

?>
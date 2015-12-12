<?php
mysql_connect("localhost", "root", "") or die("Keine Verbindung");
mysql_select_db("pollpage") or die("Keine Datenbank");
$tb = mysql_query("select * from PollPage");
echo 'Frage: '. $_POST['frage'];
echo '<br/>Antwort: '. $_POST['antwort'];
?>
<form action="#" method="post">
    <input type="submit" value="Noch eine Frage hinzufügen" />
    <input type="submit" value="Abfragen" />
</form>

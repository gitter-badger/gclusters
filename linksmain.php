<html>
<head><title>GGCs database :: Most recent links</title></head>
<body background="backgr2.jpg">

<?php include 'inte2.php'?>

<h1>Most recent links added to the database</h1>
<table border=1><tr><td><i>
Links to be listed in this page can be submitted by any user of the GGC-DB (see link at the bottom of the page)
</i></td></tr></table>
<p>

<?php

include 'conn.php';

$querylink = "SELECT * FROM linkspage ORDER BY linkdate DESC LIMIT 20";
$result = mysql_query($querylink) or die("Query failed");
$res_1 = mysql_num_rows($result);

echo 'Number of links available so far: ';
echo '<font size="+1"><b>';
echo $res_1;
echo "<p>";

print "<table border=3>\n";

?>

<?php

while ($line = mysql_fetch_row($result)) {

print "\t<tr bgcolor=\"#FFCC99\">\n";

// riga con il NOME del cluster

         $col_value=$line[1];
         print "\t\t<td colspan=3><b>$line[0]</b>  - Added on $line[5]";
         print " - <i><a href=\"singlelink.php?idart=$line[6]\">glink$line[6]</a></i></td>";
         print "</tr>\n";


// il TITOLO del link (a nuova riga)

	 print "\t\t<tr><td width=\"40%\">"."<a href=".$line[3].">".$col_value."</a></td>\n";

// DESCRIZIONE del link

	 $col_value=$line[2];
         if  ($line[4]!="") // c'e' o non c'e' la figura....
         {
	 print "\t\t<td width=\"50%\"><i>$col_value</i></td>\n";
         } else  {
         print "\t\t<td colspan=2><i>$col_value</i></td>\n";
          }

// IMMAGINE (se presente)
        $col_value=$line[4];

	if  ($line[4]!="")
	{
       print "\t\t<td width=\"10%\">"."<a href=".$line[4].">".
           "<img src=\"".$col_value.'" width="100%" border="0"></a>'.
           "</td>\n";
	}

	print "\t</tr>\n";

}

print "</table>\n";

// Closing connection

mysql_close($link);

?>


<p>
<table><tr bgcolor="yellow"><td>
<a href="linkmsub.php">Submit a link</a> for a cluster.
</tr></td></table>

<?php include 'coda.html' ?>
</b>

</body>
</html>

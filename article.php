<?php

include 'conn.php';
include 'inte2.php';
include 'columns.php';

// define queries ...

$idart= $_GET['idart'];
$idart=trim($idart);

$query_auth = "SELECT * FROM biblioclusters where ID='$idart'";

$result = mysql_query($query_auth) or die("Query failed...");
$numres = mysql_num_rows($result);

?>

<HTML>

<HEAD>

<TITLE>
<?php echo 'Gclusters :: Bibliographic item "gc'.$idart.'"'; ?>

</TITLE>

<meta name="author" content="Marco Castellani">
<meta name="Keywords" content="astronomy, Milky Way, globular clusters">

</HEAD>

<body background="backgr2.jpg" text="#000000" vlink="#330099">

<center><br>
<b>

<?php
$iiref=0;
if($numres==0) 
{
echo '<font size="+2"><i>Sorry, no article to display! Try again :-)</i></font>';
echo '<p>You may want to learn something about an  <a href="http://www.iac.es/proyecto/sumo/project.html">excellent project named SUMO</a> ...';
echo "<p>Query processed at ";
 echo date("H:i, jS F");
 echo "<br>";
 include 'coda.html'; 
exit;
}

while ($line = mysql_fetch_row($result)) {
$iiref++;

$ggc_cmd="ima/".$line[7];


$query_names = "SELECT tag FROM bibliotags WHERE paper = '$line[4]'";
$res_names = mysql_query($query_names) or die ("query_names failed");
$num_paper= mysql_num_rows($res_names);

?>
<!-- stampo i risultati su tabella -->


<table width="90%" border=2>

<tr>
<td colspan=2 align=CENTER BGCOLOR="#99CCFF"><b>
<?php echo 'Article ID: <i>gc'.$idart.'</i>'; ?>
</td>
</tr>

<?php

// AUTHOR
echo '<tr>';
echo '<td width="20%"> ';
echo 'Author';
echo '</td><td>';
echo $line[0];
echo "</td></tr>\n";

// TITLE & URL
echo '<tr><td>';
echo 'Title';
echo '</td><td>';
echo '<a href=';
echo $line[3];
echo ">";
echo $line[1];
echo "</a>";
echo "</td></tr>";

// JOURNAL
echo "<tr><td>\n";
echo 'Journal';
echo '</td><td>';
echo $line[2];
echo '</td></tr>';

// YEAR
echo '<tr><td>';
echo 'Year of publication';
echo '</td><td>';
echo $line[6];
echo "</td></tr>\n";

// ABSTRACT 
if ($line[12]!="")
    {
echo '<tr><td>';
echo 'Abstract';
echo '</td><td>';
echo "<i>$line[12]</i>";
echo "</td></tr>\n";
    }


// ACTIONS
if ($line[11]!="")
    {
echo '<tr><td>';
echo 'Actions';
echo '</td><td>';
echo '<a href="'.$line[11].'">Comment this paper on JournalFire</a>';
echo "</td></tr>\n";
    }

// altra URL per scaricare l'articolo...
if ($line[10]!="")
    {
echo '<tr><td>';
echo 'Also available at:';
echo '</td><td>';
echo '<a href="'.$line[10].'">'.$line[10]."</a>";
echo "</td></tr>\n";
    }


// if ($line[7]!="")
//     {
// echo '<tr><td>';
// echo 'CM diagram';
// echo '</td><td>';
// echo '<img src='.$ggc_cmd.'>';
// echo '</td></tr>';
//     }

echo '<tr><td>';

echo 'Tags';
echo "</td><td>";
for ($nnp=0; $nnp < $num_paper; $nnp++)
    {
    $ntag = mysql_fetch_row($res_names);
//       echo "<b>".$ntag[0]."</b>";
// 		echo '<b><a href="cluster_4.php?ggc='. $ntag[0] . ">" . $ntag[0] . "</a></b>";

      echo "<b>"."<a href=\"cluster_4.php?ggc=".urlencode($ntag[0])."\">".$ntag[0]."</a>\n";
      if ($nnp < $num_paper-1)
       {
        echo ", ";
       }
  }

echo '</table><p>';

}

// Closing connection

mysql_close($link);

 echo "<p>Query processed at ";
 echo date("H:i, jS F");
 echo "<br>";
 include 'coda.html'; 

?>

</body>
</html>

<html>

<head>
<title>GGCs DB :: Paper Submission</title>
</head>

<body background="../backgr2.jpg" text="#000000" vlink="#330099">


<center>
<img src="../globular_1.gif"><br>
<img src="../globular_2.gif">
<p>
<h3>

<a href="http://www.mporzio.astro.it/~marco/gc/">
http://www.mporzio.astro.it/~marco/gc/
</a></h3>

</center>

<p>


<strong>
Use this form to submit a paper in the GGCs-DB
</strong>
<p>

<form action="ipaper.php" method="post"> 

<table border=2>
<tr>
<td>Name of the cluster:</td>
<td> <input type=text size=60 name="cluster">
</td>
</tr>
<td>
 Author of the paper: 
<td>
<input type=text size=60 name="autore">

<tr>
<td>
Title:
<td>
<textarea name="titolo" cols=60 rows=2>
</textarea>

<tr><td>
 Journal:
<td>
<input type=text size=60 name="journal">

<tr><td>
Link:
<td>
<input type=text size=60 name="plink">

<tr><td>
Publication Date:
<td>
<input type=text size=60 name="annoart">

<tr><td>
Variables:
<td>
<input type=radio name="variab" value="S">Yes
<input type=radio name="variab" value="N" checked>No
<tr></tr>

<tr><td>Password: </td>
<td><input type=password name="pass"></td>

</tr>
</table>
<p>	
<INPUT TYPE=RESET VALUE="clear">
<INPUT TYPE=SUBMIT VALUE="submit">

</form>

<? include 'codadm.html' ?>
</body>
</html>

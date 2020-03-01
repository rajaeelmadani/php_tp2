<?php 

$etudiants[]= ["rajae","raja","SMI",16];
$etudiants[]= ["wafae","wafee","SMP",16];
$etudiants[]= ["ali","hatimi","SMP",15];
$etudiants[]= ["momo","mini","SMA",10];
$etudiants[]= ["kamilia","kam","SMI",11];
$etudiants[]= ["jihane","has","SMI",9];
$etudiants[]= ["Aimad","rrr","SMI",10];
$etudiants[]= ["sahar","rjkk","SMI",13];
$etudiants[]= ["sara","see","SMC",18];
$etudiants[]= ["toto","tati","SMI",18];
$etudiants[]= ["hanae","opp","SMP",17];
$etudiants[]= ["salma","sss","SMI",6];
$etudiants[]= ["khalid","fff","BCG",12];
$filiere="SMI";
$Nombre_etudiant=count(getEtudiant($filiere));

?>

		<?php
		define("moyen",10);
function getEtudiant($filiere){
	
			$T=array();
	for ($i=0; $i < count($GLOBALS["etudiants"]);$i++) {
	if($GLOBALS["etudiants"][$i][2]==$filiere)
			$T[]= $GLOBALS["etudiants"][$i];

}
return $T;
}

function getEtudiantRéussis($filiere){
	
			$T=getEtudiant($filiere);
			for ($i=0; $i < count($T);$i++) {
			if($T[$i][3]>= moyen)
			$s[]= $T[$i];}
		return $s;

}
function getMeilleureNote($filiere){
	     
			$T=getEtudiant($filiere);
                $max=$T[0][3];
				for ($i=0; $i < count($T);$i++) {
				if ($max < $T[$i][3]) 
				$max= $T[$i][3];
	}
	return $max;

}
 $max = getMeilleureNote($filiere);
 function getMention ($note) {
	
	if ($note < 10)
		return "Ajourné!";
	elseif (10<= $note && $note < 12)
		return "Passable";
	elseif (12 <= $note && $note < 14)
		return "Assez bien";
	elseif (14 <= $note && $note < 16)
		return "Bien";
	
	elseif (16 <= $note && $note <= 20)
		return "Tres bien";
		else 
		return "erreur";		
	
	
}
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
  

     <style type="text/css">
	 body{
	background:#fafafa;
margin:0px;

	 }
#header{
 margin-top:30px; 
background:#264c80;
height:35px;
}
 #header h5{
  font-weight:bold ;
  margin-top:-40px; 
  margin-left:350px;
  color:white;
 }
 img{
  width:90px;  
  height:80px;  
     margin-top:-30px; 
   margin-left:200px; 
  }

  table {

margin-left:150px;
border: 2px solid black;
  } 
 td,th {
	
	  
	  border: 2px solid black;
	text-align:center;
	width:200px;
	height:30px;
	
}
h3,h4{
	
	color:#121d63;
}
 </style>
</head>
<body>
<div id="header">

<img src="photo.png" > 
<h5>Faculté des sciences dhar el mehraz</h5>

</div>
<h3>Liste des étudiants de la filière: <?= $filiere ?></h3></br></br>
<table>
	<tr> 
		<th>Nom </th>
		<th>Prenom </th>
		<th>Note</th>
		
	</tr>
	<?php
	$T=getEtudiant($filiere);
foreach($T as $e){
	echo"
	<tr>
<td>" . $e[0] . "</td>
<td>" . $e[1] . "</td>

<td>" . $e[3] . "</td>
</tr>";
}?>
</table></br></br>

<h4>Meilleur note : <?= $max?></h4>
<h4>Nombre des étudiants de la filière : <?= $Nombre_etudiant?> </h4>

<h3>Liste des étudiants réussissent dans la filière: <?= $filiere ?></h3></br></br>

<table>
	<tr> 
		<th>Nom </th>
		<th>Prenom </th>
		<th>Note</th>
		<th>Mention</th>
	</tr>
	
	<?php
		$T=getEtudiantRéussis($filiere);
		
foreach($T as $e){
	echo"
	<tr>
<td>" . $e[0] . "</td>
<td>" . $e[1] . "</td>

<td>" . $e[3] . "</td>
<td>" . getMention($e[3]). "</td>

</tr>";
}

		?>


</table>
</body>
</html>
 
 
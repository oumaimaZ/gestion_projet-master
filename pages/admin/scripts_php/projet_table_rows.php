<?php  
while($ligne = $query->fetch())
{

	if($ligne['statut'] < '10') $stat= 'ouvert';
	else if($ligne['statut'] > '11') $stat= 'en cours';
	else if($ligne['statut'] > '98') $stat='achevé';
	echo "<tr>";
	echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_projet']."'>"."</td>";
	echo "<td align='center'>".$ligne['titre']."</td>";
	echo "<td align='center'>".$ligne['proprietaire']."</td>";
	echo "<td align='center'>".$stat."</td>";
	echo "<td align='center'>".$ligne['date_creation']."</td>";

	echo'<td align="center"><a class=" menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier_projet" onclick="triggerDocumentModal('.$ligne['id_projet'].' );"></a></td>';
	echo '<td align="center"><button class="b btn btn-sm btn-warning" data-toggle="modal" data-target="#detail_projet" value='.$ligne['id_projet'].' >details</a></td>';
	echo "</tr>";
                  //test
}
?>
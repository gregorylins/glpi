<?php
/*
 
 ----------------------------------------------------------------------
GLPI - Gestionnaire libre de parc informatique
 Copyright (C) 2002 by the INDEPNET Development Team.
 http://indepnet.net/   http://glpi.indepnet.org

 ----------------------------------------------------------------------
 LICENSE

This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ----------------------------------------------------------------------
 Original Author of file:
 Purpose of file:
 ----------------------------------------------------------------------
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php
// Include CSS
	echo "<style type=\"text/css\">\n";
				include ("_relpos.php");

		include ($phproot . "/glpi/config/styles.css");
	echo "</style>\n";
?>

</head>

<body>
<script language="javascript">
function fillidfield(Id){
window.opener.document.forms["helpdeskform"].elements["computer"].value = Id;
window.close();}
</script>

<div align="center">
  <p><strong>Rechercher votre num�ro de machine </strong></p>
  <form name="form1" method="post" action="find_num.php">
    <table cellspacing="1" width="100%" border="0">
      <tr> 
        <th align='center'  width="100%" height="29">Saisissez votre nom ou les
          premi�res lettres de votre nom </th>
        </tr><tr><td class='tab_bg_1' align='center' width="100%"> 
		<input name="NomContact" type="text" id="NomContact" >
           <input type="submit" name="Submit" value="Rechercher">
 </td>
      </tr>
    </table>
	
  </form>
</div>
<?php

if(isset($_POST["Submit"]))
{
	include ("_relpos.php");
	include ($phproot . "/glpi/includes.php");
	echo "<table width='100%' border='0'>";
	echo " <tr class='tab_bg3'>";
	echo " <td align='center' width='70%'><b>Nom du contact </b></td>";
	echo " <td align='center' width='30%'><b>N� machine </b></td>";
	echo " </tr>";
	echo "</table>";

	$db = new DB;
	$query = "select ID,contact from computers where contact like '%".$_POST["NomContact"]."%'";
	$result = $db->query($query);
	while($ligne = $db->fetch_array($result))
	{
		$Comp_num = $ligne['ID'];
		$Contact = $ligne['contact'];
		echo "<table width='100%' border='0'>";
		echo " <tr class='tab_bg_1' onClick=\"fillidfield(".$Comp_num.")\">";
		echo "<td width='70%'><b> $Contact </b></td>";
		echo "<td align='center' width='30%'";
		echo "<b> $Comp_num </b></td>";
		echo " </tr>";
		echo "</table>";
	}

}
?>
</body></html>


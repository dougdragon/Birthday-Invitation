<?php
require("includes/header.php");
require("includes/email_address_form.php");
include('db_connect.php');


if (!empty($_GET)) {
	$email_address = $_GET['email_address'];
	$result = mysql_query("SELECT id, EmailAddress, FirstName, Attending FROM brennabdayinvite.invitelist where EmailAddress = '" . $email_address . "'") or die(mysql_error());
	$count = mysql_numrows($result);
	echo "<h3 align='center'>$count results for Email address: $email_address</h3>";
	
	if (mysql_num_rows($result) > 0) {
		echo "<br /><br /><table class='table table-striped table table-bordered table table-condensed' border='1'><tr><td align='center'>Name</td><td>Attending:</tr>";
		while ( $row = mysql_fetch_array($result) ) {
			//$attend_query = mysql_query("UPDATE brennabdayinvite.invitelist set Attending = 1 WHERE EmailAddress = '" . $email_address . "' AND FirstName = '" . $row['FirstName'] .";";
			echo "<tr>";
			echo '<td align="left">' . $row["FirstName"] . '</td>';
			echo "<td><button class='btn btn-info'>Yes, I can make it!</button> &nbsp;&nbsp;<button class='btn btn-warning'>Sorry, I can&apos;t make it</button></td>";
			// if ($row["Attending"] == 1) {
				// echo '<td align="left">Yes!</td>';
			// }
			// else {
				// echo '<td align="left">Sorry, can&apos;t make it.</td>';
			
			// }
			//echo '<td align="left">' . '"' . $row["Attending"] . '"' . '</td>';
			echo '</tr>';
		}
		echo "</table>";
		// close db connection
		mysql_close($link);
	
	
	}
	else {
		echo "<p class='lead' align='center'>Sorry, I couldn't find any information matching $email_address.</p>";
	}
}
else {
	echo "";
}
			
?>
			
	</div>
			
	<br />
</body>
</html>
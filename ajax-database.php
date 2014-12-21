<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="styles/css/main.css" />
	
	<title>Ajax Post Database Example</title>
</head>
<body>


<div id="main">

<h1>Using AJAX POST request to pull from database</h1>

<p>Select one:</p> <select name="gender" id="gender">
	<option value="gender">Gender</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
</select>

<p>Results:</p>
<table id="people" border="1">
	<thead>
		<th>Name</th>
		<th>Gender</th>
	</thead>

	<tbody>
		
	</tbody>
</table>

<hr>
<p><a href="https://jonsuh.com/blog/convert-loop-through-json-php-javascript-arrays-objects/">AJAX Reference Link</a></p>
<p><a href="http://www.sanwebe.com/2013/03/basic-php-mysqli-usage">MySQLi Reference Link</a></p>

</div>

<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script>
	$('#gender').on("change", function() {
		
		$.ajax({
			type: "POST",
			data: {
				"gender": $("#gender").val()
			},
			url: "php/ajax-database-connect.php",
			dataType: "json",
			success: function(JSONObject) {
				var peopleHTML = "";

				for (var key in JSONObject) {
					if (JSONObject.hasOwnProperty(key)) {
						peopleHTML += "<tr>";
							peopleHTML += "<td>" + JSONObject[key]["name"] + "</td>";
							peopleHTML += "<td>" + JSONObject[key]["gender"] + "</td>";
						peopleHTML += "</tr>";
					}
				}

				$("#people tbody").html(peopleHTML);

			}
		});
	});


</script>

	
</body>
</html>












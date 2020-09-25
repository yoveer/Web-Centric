<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$("button#getHouses").click(function() {
				//Set up an AJAX call to http://localhost/Web-Centric/CRUD_HTA/rentDBUpdateWebService/house/list/?address=, passing the owner id as parameter
				//Let us access whether the user has specified the address part
				var address = $("input#lkup_txt_address").val();
				//Let us call the web service

				var url = "http://localhost/Web-Centric/CRUD_HTA/rentDBUpdateWebService/supplier/list/";
				if (address != "") {
					url = url + "?address=" + address;
				}
				alert(url);
				$.ajax({
						url: url,
						accepts: "application/json",
						headers: {
							Accept: "application/json"
						},
						//headers:{Content-Type: "application/x-www-form-urlencoded"},
						method: "POST",
						error: function(xhr) {
							if (xhr.status == 404) {
								$("div#showhouses").html("No houses were found");
							} //end if
							else {
								alert("An error occured: " + xhr.status + " " + xhr.statusText);
							}
						}
					})
					.done(function(data) {
						//alert(JSON.stringify(data.output));	
						var table_str = "<table><tr><th>Address</th><th>List Price</th><th>Swimming Pool</th></tr>";
						//We show the jQuery.each function to iterate over the elements of the array
						//http://api.jquery.com/jquery.each/
						$.each(data.output, function(i, obj) {
							table_str = table_str + "<tr>";
							table_str = table_str + "<td>" + obj['id'] + "</td>";
							table_str = table_str + "<td>" + obj['username'] + "</td>";
							table_str = table_str + "<td>" + obj['user_email'] + "</td>";
							table_str = table_str + "</tr>";
						});
						table_str = table_str + "</table>";
						$("div#showhouses").html(table_str);
					}) //.done(function(data)
				; //$.ajax({
			}); //$("button#getHouses").click(function(){


			$("button#createHouse").click(function() {
				//Set up an AJAX call to http://localhost/Web-Centric/CRUD_HTA/rentDBUpdateWebService/house/create/

				var url = "http://localhost/Web-Centric/CRUD_HTA/rentDBUpdateWebService/supplier/create/";

				$.ajax({
						url: url,
						//accepts: "application/json",
						headers: {
							Accept: "application/json"
						},

						method: "POST",
						data: {
							username: $("input#create_txt_uname").val(),
							user_email: $("input#create_txt_email").val()
						},
						error: function(xhr) {

							alert("An error occured: " + xhr.status + " " + xhr.statusText);
						}
					})
					.done(function(data) {
						$("span#createresult").html("House details added successfully");
					}) //.done(function(data)
				; //$.ajax({
			}); //$("button#createHouse").click(function(){

		}); //$(document).ready(function()
	</script>

</head>

<body>
	<form>
		<fieldset>
			<legend>Property List </legend>
			Optional Address to lookup:<input type="text" id="lkup_txt_address">
			<button type="button" id="getHouses">Get Houses</button>
			<div id="showhouses">
			</div>

		</fieldset>

		<fieldset>
			<legend>Add Supplier</legend>
			Username:<input type="text" id="create_txt_uname">
			User Email:<input type="text" id="create_txt_email">

			<button type="button" id="createHouse">Create House</button>
			<span id="createresult">
			</span>
		</fieldset>


	</form>
</body>

</html>
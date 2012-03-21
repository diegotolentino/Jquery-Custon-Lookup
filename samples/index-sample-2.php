<html>
<head>

<script type='text/javascript'
	src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js?ver=3.2.1'></script>

<script type='text/javascript'
	src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js?ver=3.2.1'></script>

<!-- Load you  jquery-ui.css-->	

<link rel="stylesheet" href="../jquery.lookup.css" type="text/css" />

<script type='text/javascript' src='../jquery.lookup.js'></script>
</head>
<body>
	<script type="text/javascript">
	$('document').ready(function (){
		/*init display field of country*/
		jqueryLookup(
				$('#nmcountry'),
				function (event, ui){
					$('#idcountry').val(ui.item[0]);
					$('#nmcountry').val(ui.item[2]);
					return false;
				},
				'sample-1_load.php'
		);

		/*init display field of state*/
		jqueryLookup(
				$('#nmstate'),
				function (event, ui){
					$('#idstate').val(ui.item[0]);
					$('#nmstate').val(ui.item[2]);
					return false;
				},
				'sample-2_load_state.php',
				{
					idcountry: function (){ return $('#idcountry').val(); }
				}
		);
		
		})
</script>

	<table>
		<tr>
			<td>Country: </td>
			<td>
				<input type="text" id="nmcountry"> 
				<input type="hidden" id="idcountry">
			</td>
			<td>Type "Brazil" or "United States"</td>
		</tr>
		<tr>
			<td>State:</td>
			<td>
				<input type="text" id="nmstate"> 
				<input type="hidden" id="idstate">
			</td>
		</tr>
	</table>

</body>
</html>
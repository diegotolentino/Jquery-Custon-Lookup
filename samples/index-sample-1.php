<html>
<head>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js?ver=3.2.1'></script>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js?ver=3.2.1'></script>

<!-- Load you  jquery-ui.css-->	
 
<link rel="stylesheet" href="../jquery.lookup.css" type="text/css" />

<script type='text/javascript' src='../jquery.lookup.js'></script>
</head>
<body>
	<script type="text/javascript">
	$('document').ready(function (){
		/*init display field*/
		jqueryLookup(
				$('#nmpessoa'),
				function (event, ui){
					$('#idpessoa').val(ui.item[0]);
					$('#nmpessoa').val(ui.item[2]);
					return false;
				},
				'sample-1_load.php'
);})
</script>

	<input type="text" id="nmpessoa">
	<input type="hidden" id="idpessoa">

</body>
</html>
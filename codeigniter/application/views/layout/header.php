<!DOCTYPE html>
<html>
<head>
  <title>Medical Record Tracking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type = "text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">
  <script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
  <script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
  <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
$(document).ready(function(){
    $("#searchValue").keyup(function(){
        $("#searchValue").css("background-color", "pink");
    });
});

</script>
</head>

<body>

<div class ="navbar navbar-default">
	<div class= "container">
	<?php echo($data[0]['hname'][0]->Name) ?>
	<a href="<?php echo base_url('Test/index'); ?>" class="btn btn-default float-right">Log Out</a>
	</div>
</div>

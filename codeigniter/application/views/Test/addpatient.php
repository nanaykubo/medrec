<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title>Medical Record Tracking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type = "text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">

</head>

<body>  

<div class ="navbar navbar-default">
  <div class= "container">
    <h1>PATIENT RECORDS</h1>
  </div>
</div>

<div class = "container">
  <h4>ID : <?php echo $tabletest[0]->ID?></h4>
  <h5><?php echo $tabletest[0]->LN?>,<?php echo $tabletest[0]->FN?> <?php echo $tabletest[0]->MN?></h5>
  <h5><?php echo $tabletest[0]->Brgy?>, <?php echo $tabletest[0]->St?> <?php echo $tabletest[0]->City?></h5>
  <br/>
  <a href="<?php echo base_url('Test/add/'); ?>" class="btn btn-primary btn-primary btn-sm">Add Record</a>
  <br/><br/>
  <form action="<?php echo base_url('Test/submit') ?>" method="post" class=form-horizontal">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Service</th>
      <th scope="col">Result</th>
      <th scope="col">Diagnosis</th>
      <th scope="col">Prescription</th>
      <th scope="col">Return Date</th>
    </tr>
  </thead>
  <tbody>
      <td><?php echo $recordsinfo[0]->DATE;?></td>
      <td><?php echo $recordsinfo[0]->RecordType;?></td>
      <td><?php echo $recordsinfo[0]->RESULT;?></td>
      <td><?php echo $recordsinfo[0]->DIAGNOSIS;?></td>
      <td><?php echo $recordsinfo[0]->PRESCRIPTION;?></td>
      <td><?php echo $recordsinfo[0]->RETURNDATE;?></td>
    </tr>

  </tbody>
</table>
<br/>
  <a href="<?php echo base_url('Test/logged'); ?>" class="btn btn-default">Back</a>
  </form>


</body>
</html>

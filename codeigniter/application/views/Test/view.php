<?php
$connect = mysqli_connect("localhost","root","","demo");
if(isset($_POST["insert"]))
{
  $file = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));
  $query = "INSERT INTO precords(ID,HCID,RecordType,DATE,RETURNDATE,RESULT,PRESCRIPTION,Attached) 
   VALUES ('".$_POST['ID']."'
   ,'".$_POST['txt_HCID']."'
   ,'".$_POST['Service']."'
   ,'".$_POST['DATE']."'
   ,'".$_POST['ReturnDate']."'
   ,'".$_POST['Result']."'
   ,'".$_POST['Prescription']."'
   ,'$file')";
  $qry = mysqli_query($connect, $query);
  echo "<meta http-equiv='refresh' content='0'>";
}
?>


<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title> TESTING 123</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type = "text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">

</head>

<body>
<div class ="navbar navbar-default">
  <div class= "container">
    <h1>PATIENT MEDICAL RECORDS</h1>
  </div>
</div>

<div class = "container">
  <h5><?php echo $tabletest[0]->LN?>,<?php echo $tabletest[0]->FN?> <?php echo $tabletest[0]->MN?></h5>
  <h5><?php echo $tabletest[0]->Brgy?>, <?php echo $tabletest[0]->St?> <?php echo $tabletest[0]->City?></h5>
  <br/>
  <button class="btn btn-primary btn-primary btn-sm"
    data-toggle="modal" data-target="#showModal">Add Record</button>
  <br/><br/>
  <form method="post" enctype="multipart/form-data">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Service</th>
      <th scope="col">Result</th>
      <th scope="col">Prescription</th>
      <th scope="col">Return Date</th>
      <th scope="col">Attached</th>
    </tr>
  </thead>
  <tbody>

    <?php
      //retrive parameters from Test.php controller
      if($recordsinfo[0])
      {
        //set dataset info to variable test
        foreach ($recordsinfo as $test) 
        //get header ID and print out each
        {
      ?>
      <td><?php echo $test->DATE;?></td>
      <td><?php echo $test->RecordType;?></td>
      <td><?php echo $test->RESULT;?></td>
      <td><?php echo $test->PRESCRIPTION;?></td>
      <td><?php echo $test->RETURNDATE;?></td>
      <td><a href="<?php echo base_url('Test/viewblob/'.$test->recordno); ?>" class="btn btn-info btn-info btn-sm"
      data-toggle="modal" data-target="#viewModal">View</a></td>
    </tr>

  </tbody>
  <?php
      //continuation to loop all in the dataset to the body

      }

      }
      ?>
</table>
<br/>
  <a href="<?php echo base_url('Test/logged'); ?>" class="btn btn-default">Back</a>

  <div class="modal" id="showModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ID : <?php echo $tabletest[0]->ID?>
        <br/><br/>
        <input type="hidden" name="DATE" id="DATE" value="<?php echo date("Y/m/d") ?>">
        Date : <input type="text" name="DATE2" id="DATE2" disabled="" value="<?php echo date("Y/m/d") ?>">
        <br/><br/>
        ReturnDate : <input type="date" name="ReturnDate" id="ReturnDate">
        <br/><br/>
        Service : <select name="Service" id="Service" style="width: 11.5em">
        <option>CHECKUP</option>
        <option>SERVICE</option>
      </select>
      <br/><br/>
      <input type="hidden" name="txt_HCID" id="txt_HCID" value="<?php echo $tabletest[0]->HCID ?>">
      <input type="hidden" name="ID" id="ID" value="<?php echo $tabletest[0]->ID ?>">
        Prescription : <input type="text" name="Prescription" id="Prescription">
        <br/><br/>
        Attached Files : <input type="file" name="file" id="file">
                <br/><br/>
        Result : <input type="text" name="Result" id="Result">
        <br/><br/>
      </div>
      <div class="modal-footer">
        <button type="" id=insert name ="insert" type="submit" class="btn btn-primary" >Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="viewModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"
          >&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>

  </form>
</body>
</html>

<script>
  $('#viewModal').on('hidden.bs.modal', function () {
 location.reload();
})
</script>
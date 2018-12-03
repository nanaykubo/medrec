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
    <h1>LIST OF FAMILIES</h1>
  </div>
</div>

<div class = "container">
  <h5>Health Center ID : <?php echo $healthcenterinfo[0]->HCID?></h5>
  <h5><?php echo $healthcenterinfo[0]->Name ?></h5>
  <h5><?php echo $healthcenterinfo[0]->Location ?></h5>
  <h5> BRGY : <?php foreach ($brgyinfo as $test) { ?>
  <?php print(print_r($test->BRGYID, true)); ?>
  <?php }?></h5>  
  <br/>

  <a href="<?php echo base_url('Test/addRecords/'); ?>" class="btn btn-primary btn-primary btn-sm"
    data-toggle="modal" data-target="#showModal">Add New Family</a>
  <br/><br/>
  <form action="<?php echo base_url('Test/submitNewFamily/'.$healthcenterinfo[0]->HCID) ?>" method="post" class=form-horizontal">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Family Code</th>
      <th scope="col">Family Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      //retrive parameters from Test.php controller
      if($familyinfo[0])
      {
        //set dataset info to variable test
        foreach ($familyinfo as $test) 
        //get header ID and print out each
        {
      ?>
      <td><?php echo $test->code;?></td>
      <td><?php echo $test->Name;?></td>
      <td>  
      <a data-toggle="modal" data-target="#viewModal" id="View" class="btn btn-primary btn-primary btn-sm">View</a>
      </td>
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
        HCID : <?php echo $healthcenterinfo[0]->HCID?>
        <br/><br/>
        Family Name : <input type="text" name="txt_Name" id="txt_Name">
        <input type="hidden" name="txt_HCID" id="txt_HCID" value="<?php echo $healthcenterinfo[0]->HCID ?>">
      </div>
      <div class="modal-footer">
        <button type="" type=submit class="btn btn-primary" >Add Family</button>
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
        <h5 class="modal-title">Add Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Family Info
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

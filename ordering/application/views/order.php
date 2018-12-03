<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Design System - Free Design System for Bootstrap 4</title>
  <!-- Favicon -->
  <link href="<?php echo base_url()?>/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url()?>/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url()?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url()?>/assets/css/argon.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="<?php echo base_url()?>/assets/css/docs.min.css" rel="stylesheet">
</head>

<body>
  <main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small><a href="#">Enter PML(SINGLE PIZZA ONLY)</a></small>
                </div>
                <form role="form" method="post" action="<?php echo base_url('home/submit') ?>">
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <textarea name="pml" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                  </div>
                  <?php if($this->session->flashdata()) { ?>
                  <div class="text-muted font-italic">
                    <small>
                      <span class="text-danger font-weight-700"><?php echo $this->session->flashdata('validation');?></span>
                    </small>
                  </div>
                  <?php } ?>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Submit PML</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Core -->
  <script src="<?php echo base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>/assets/vendor/popper/popper.min.js"></script>
  <script src="<?php echo base_url()?>/assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>/assets/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url()?>/assets/js/argon.js?v=1.0.1"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asio Rezim</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/output.css"); ?>">
  <link href="https://fonts.cdnfonts.com/css/birica" rel="stylesheet">
</head>
<body class="flex bg-gray-100">
  
  <?php $this->load->view("partials/back_office/nav"); ?>

  <main class="mx-6 w-5/6">
    <?php $this->load->view("partials/back_office/header"); ?>

    <?php $this->load->view("partials/back_office/accueil"); ?>
    
  </main>

</body>
</html>
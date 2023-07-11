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

    <div class="flex flex-col rounded-md w-full items-center mt-4">

      <div id="tableau-bord" class="grid grid-cols-4 w-full gap-x-4 mb-4">
        <div class="shadow-md rounded-md bg-white p-6 text-center">
          <h3 class="font-semibold text-[#39AEC0] text-2xl mb-5">Chiffres d'affaire</h3>
          <span class="font-medium text-gray-600 text-xl"><?= $chiffre ?> Ar</span>
        </div>
        <div class="shadow-md rounded-md bg-white p-6 text-center">
          <h3 class="font-semibold text-[#39AEC0] text-2xl mb-5">Nombres d'utilisateur</h3>
          <span class="font-medium text-gray-600 text-xl"><?= $nbruser ?> personnes</span>
        </div>
        <div class="shadow-md rounded-md bg-white p-6 text-center">
          <h3 class="font-semibold text-[#39AEC0] text-2xl mb-5">Manatavy taolana</h3>
          <span class="font-medium text-gray-600 text-xl"><?= $aug ?> personnes</span>
        </div>
        <div class="shadow-md rounded-md bg-white p-6 text-center">
          <h3 class="font-semibold text-[#39AEC0] text-2xl mb-5">Manihena taolana</h3>
          <span class="font-medium text-gray-600 text-xl"><?= $red ?> personnes</span>
        </div>
      </div>

      <div id="statistique" class="grid grid-cols-2 w-full gap-x-4 mb-4">
        <div class="shadow-md rounded-md bg-white p-6 overflow-hidden">
          <canvas id="graphe-1" style="width:100%; max-width:700px"></canvas>
          <div class="font-semibold text-gray-500 text-2xl text-center mt-4">Statistique de chiffre d'affaire</div>
        </div>
        <div class="shadow-md rounded-md bg-white p-6">
          <canvas id="graphe-2" style="width:100%; max-width:700px"></canvas>
          <div class="font-semibold text-gray-500 text-2xl text-center mt-4">Gain et Perte moyenne poids</div>
        </div>
     </div>
     
    </div>

  </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
  window.addEventListener("load", () => {
      $(document).ready(() => {
      $.ajax({
        method: "GET",
        url: "<?= base_url("C_Admin/graphe") ?>",
        data: null,
        processData: false,
        contentType: false,
        success: (response) => {
          let res = JSON.parse(response);
          console.log(JSON.stringify(res));

          const graphe1 = document.getElementById("graphe-1").getContext('2d');
          const graphe2 = document.getElementById("graphe-2").getContext('2d');

          const xValues = [50,60,70,80,90,100,110,120,130,140,150];

          new Chart(graphe1, {
            type: "line",
            data: {
              labels: xValues,
              datasets: [{
                data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
                borderColor: "#111622",
                fill: false
              },{
                data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
                borderColor: "#39AEC0",
                fill: false
              }]
            },
          });

          new Chart(graphe2, {
            type: "line",
            data: {
              labels: xValues,
              datasets: [{
                data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
                borderColor: "#111622",
                fill: false
              },{
                data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
                borderColor: "#39AEC0",
                fill: false
              }]
            },
          });
        },
      });
    });
  });
</script>
<script>
  

</script>
</body>
</html>
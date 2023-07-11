<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asio Rezim</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/output.css"); ?>">
  <link href="https://fonts.cdnfonts.com/css/birica" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>
  <?php $this->load->view("partials/front_office/header"); ?>

  <main class="px-36 py-10 max-w-7xl mx-auto">
    <h1 class="mb-6 text-3xl font-semibold text-gray-600">Detail régime</h1>

    <div class="w-full flex gap-4">

      <!-- Left -->
      <div>

        <div class="mb-10">

          <h2 class="mb-3 text-xl font-medium text-[#39AEC0]">Listes plats proposés</h2>
          <div class="flex gap-4 flex-wrap">

            <?php for($i = 0; $i < count($detail); $i++) { ?>
              <?php if($detail[$i]["nature"] == "plat") { ?>
              <div class="shadow-xl relative rounded-md h-36 w-52 overflow-hidden flex items-end pl-4 pb-4 bg-cover" style="background-image: url('<?php echo base_url(); ?>assets/img/bg-sakafo-login.jpg');">
                <div class="absolute top-0 left-0 w-full h-full" style="background: linear-gradient( rgba(16, 16, 16, 0) 0%, rgba(16, 16, 16, 0.9) 100% );"></div>
                <div class="flex flex-col">
                  <p class="relative z-10 text-sm text-gray-100 font-semibold"><?= $detail[$i]["nom"] ?></p>
                  <p class="relative z-10 text-md text-gray-100 font-normal"><?= $detail[$i]["apportcalorie"] ?> Calories</p>
                </div>
              </div>
              <?php } ?>
            <?php } ?>

          </div>

        </div>

        <div class="mb-10">

         <h2 class="mb-3 text-xl font-medium text-[#39AEC0]">Listes activité sportive proposé</h2>

          <div class="flex gap-4 flex-wrap">

          <?php for($i = 0; $i < count($detail); $i++) { ?>
              <?php if($detail[$i]["nature"] == "sport") { ?>
              <div class="shadow-xl relative rounded-md h-36 w-52 overflow-hidden flex items-end pl-4 pb-4 bg-cover" style="background-image: url('<?php echo base_url(); ?>assets/img/bg-sakafo-login.jpg');">
                <div class="absolute top-0 left-0 w-full h-full" style="background: linear-gradient( rgba(16, 16, 16, 0) 0%, rgba(16, 16, 16, 0.9) 100% );"></div>
                <div class="flex flex-col">
                  <p class="relative z-10 text-sm text-gray-100 font-semibold"><?= $detail[$i]["nom"] ?></p>
                  <p class="relative z-10 text-md text-gray-100 font-normal"><?= $detail[$i]["deficitcalorie"] ?> Calories</p>
                </div>
              </div>
              <?php } ?>
            <?php } ?>

          </div>

        </div>

      </div>

      <!-- Right -->
      <div class="flex justify-center items-start grow">

        <div class="shadow p-5 rounded-md w-[300px] flex flex-col sticky top-[90px]">
          <h2 class="text-[#39AEC0] font-bold text-2xl mb-4" style="font-family: 'Birica';"><?= $suggestion["nomregime"] ?></h2>

          <p class="text-gray-600 font-semibold">&rarr; <?php if($suggestion["idobjectif"] == 1) { echo "Poids +"; } else { echo "Poids -"; } ?></p>
          <p class="text-gray-600 font-semibold">&rarr; <?= $suggestion["duree"] ?> jours</p>
          <p class="text-gray-600 font-semibold">&rarr; <?= $suggestion["prix"]; ?> Ar</p>

          <div class="mt-4 flex flex-col gap-4">
            <a href="#" id="btn-buy" class="bg-[#39AEC0] hover:bg-[#40c4d8] transition-all duration-300 w-full px-4 py-3 text-center font-semibold text-white text-md focus:outline-none">Acheter</a>
            <a href="#" id="#" class="bg-[#24727e] hover:bg-[#2d8c9b] transition-all duration-300 w-full px-4 py-3 text-center font-semibold text-white text-md focus:outline-none">Exporter en pdf</a>
          </div>
          <input type="hidden" value="<?= $suggestion["idregime"] ?>" name="idregime">
        </div>
      </div>

    </div>

    
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script>
		$(document).ready(() => {
			$("#btn-buy").click((e) => {
				e.preventDefault();
				$("#btn-submit span:nth-child(1)").removeClass("hidden");
				$("#btn-submit span:nth-child(2)").addClass("hidden");
				var formData = new FormData(document.getElementById("form-register"));

				$.ajax({
					method: "POST",
					url: "<?= base_url("C_User/inscription") ?>",
					data: formData,
					processData: false,
					contentType: false,
					success: (response) => {
						let res = JSON.parse(response);
						if(res.response === "success") {
							window.location.href = "<?= base_url("C_User/completion") ?>";
						} else if (res.response === "error") {
							$("#message-error").text(res.message);
							$("#toast-danger").removeClass("hidden");
						}
						$("#btn-submit span:nth-child(1)").addClass("hidden");
						$("#btn-submit span:nth-child(2)").removeClass("hidden");
					},
				});
			});

			$("#button-close").click(() => {
				$("#toast-danger").addClass("hidden");
			});
		});
	</script>
</body>
</html>
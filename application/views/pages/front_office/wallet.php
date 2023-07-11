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
<body>
  <?php $this->load->view("partials/front_office/header"); ?>
  <main class="px-36 py-10 max-w-7xl mx-auto">
    <h1 class="mb-6 text-3xl font-semibold text-gray-600">Porte monnaie</h1>

    <div class="mb-10">
      <h2 class="mb-3 text-xl font-medium text-[#39AEC0]">Mon solde</h2>
      <div class="flex gap-4 items-center">

      <div class="flex gap-4">
        <div class="text-gray-400 text-3xl shadow p-5 rounded">
          <?= $solde ?> Ar
        </div>

        <form id="formDepot" class="shadow p-5 flex gap-4 rounded" action="#" method="post">
          <input required name="code" class="w-full text-lg h-12 px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="password" placeholder="Entrer code">

          <button id="btn-submit" class="hover:bg-[#40c4d8] transition-all duration-300 h-12 px-4 py-2 bg-[#39AEC0] text-center font-semibold text-white text-lg focus:outline-none">
            <span class="hidden flex justify-center items-center">
              <div class="animate-spin rounded-full h-8 w-8 border-r-2 border-b-4 border-white"></div>
            </span>
            <span class="">Valider</span>
          </button>

        </form>
      </div>

      </div>
    </div>

    <div class="relative overflow-x-auto mb-10">
        <h2 class="mb-3 text-xl font-medium text-[#39AEC0]">Liste des codes</h2>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Montant
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($listecode); $i++) { ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $listecode[$i]["numerocode"] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $listecode[$i]["montantcode"] ?> Ar
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>
    </div>

    <div class="relative overflow-x-auto mb-10">
        <h2 class="mb-3 text-xl font-medium text-[#39AEC0]">Liste des derniers transactions</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nom régime
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Objectif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Durée
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date de transaction
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($transactions); $i++) { ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $transactions[$i]["nomregime"] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php if($transactions[$i]["idobjectif"] == 1) { echo "Poids +"; } else { echo "Poids -"; } ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $transactions[$i]["duree"] ?> jours
                        </td>
                        <td class="px-6 py-4">
                        <?= $transactions[$i]["dateachat"] ?>
                        </td>
                        <td class="px-6 py-4">
                        <?= $transactions[$i]["montant"] ?> Ar
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

  </main>

   

    <div id="toast-success" class="hidden z-[999] fixed top-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div id="message-success" class="ml-3 text-sm font-normal"></div>
        <button id="button-close" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    <div id="toast-danger" class="hidden z-[999] fixed top-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
          </svg>
          <span class="sr-only">Error icon</span>
      </div>
      <div id="message-error" class="ml-3 text-sm font-normal"></div>
      <button id="button-close" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
      </button>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script>
		$(document).ready(() => {
			$("#formDepot").submit((e) => {
				e.preventDefault();
				$("#btn-submit span:nth-child(1)").removeClass("hidden");
				$("#btn-submit span:nth-child(2)").addClass("hidden");

                 var formData = new FormData(document.getElementById("formDepot"));

				$.ajax({
					method: "POST",
					url: "<?= base_url("C_User/insertCode/") ?>",
                    data: formData,
					processData: false,
					contentType: false,
					success: (response) => {
						let res = JSON.parse(response);

						if(res.response === "success") {

                            $("#message-success").text(res.message);
							$("#toast-success").removeClass("hidden");

						} else if (res.response === "error") {
							$("#message-error").text(res.message);
							$("#toast-danger").removeClass("hidden");
						}

						$("#btn-submit span:nth-child(1)").addClass("hidden");
						$("#btn-submit span:nth-child(2)").removeClass("hidden");
					},
				});
			});

      const allBtnClose = document.querySelectorAll("#button-close");
      allBtnClose.forEach((item) => {
          item.addEventListener("click", () => {
          $("#toast-success").addClass("hidden");
          $("#toast-danger").addClass("hidden");
        });
      });
		});
	</script>
</body>
</html>
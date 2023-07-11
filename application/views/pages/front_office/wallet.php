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
        
        <button data-modal-target="modal-list-code" data-modal-toggle="modal-list-code" class="ml-4 h-12 px-4 py-2 text-[#39AEC0] transition-all duration-300  font-bold hover:bg-[#39aec018] border border-[#39AEC0]">
            Voir liste code
        </button>

      </div>
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

    <div id="modal-list-code" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative">
            <!-- Modal content -->
            <div class="relative w-[500px] bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-list-code">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-8 py-6 lg:px-8">

                  <div class="relative overflow-x-auto">
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
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        123021983109
                                    </th>
                                    <td class="px-6 py-4">
                                         10000 Ar
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>
</html>
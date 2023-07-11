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

    <div class="shadow-md rounded-md bg-white p-6 w-full mt-4">
      <div class="flex mb-3">
        <h2 class="text-xl font-medium text-[#39AEC0] mr-auto">Listes régimes</h2>
        <a href="<?= base_url("C_Admin/ajout_regime") ?>" id="btn-update" class="hover:bg-[#92afff] bg-[#7fa1ff] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
          Ajouter  
        </a>
      </div>

      <div class="relative overflow-x-auto mb-10">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nom régime
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Objet
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Durée
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Papaye à la tantely
                    </th>
                    <td class="px-6 py-4">
                        +5 poids
                    </td>
                    <td class="px-6 py-4">
                        7 jours
                    </td>
                    <td class="px-6 py-4 flex gap-4 justify-center">
                      <a href="<?= base_url("C_Admin/modif_regime/1") ?>" id="btn-update" class="hover:bg-[#40c4d8] bg-[#39AEC0] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
                        Modifier
                      </a>
                      <button data-modal-target="popup-modal-delete" data-modal-toggle="popup-modal-delete" type="button" id="btn-delete" class="hover:bg-[#ff9a9a] bg-[#ff7e7e] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
                        Supprimer  
                      </button>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Papaye à la tantely
                    </th>
                    <td class="px-6 py-4">
                        +5 poids
                    </td>
                    <td class="px-6 py-4">
                        7 jours
                    </td>
                    <td class="px-6 py-4 flex gap-4 justify-center">
                      <a href="<?= base_url("C_Admin/modif_regime/1") ?>" id="btn-update" class="hover:bg-[#40c4d8] bg-[#39AEC0] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
                        Modifier  
                      </a>
                      <button data-modal-target="popup-modal-delete" data-modal-toggle="popup-modal-delete" type="button" id="btn-delete" class="hover:bg-[#ff9a9a] bg-[#ff7e7e] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
                        Supprimer  
                      </button>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>

  </main>

  <div id="popup-modal-delete" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-delete">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Voulez-vous vraiment supprimer ce produit ?</h3>
                <button data-modal-hide="popup-modal-delete" type="button" class="text-white hover:bg-[#ff9a9a] bg-[#ff7e7e] focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Oui, je suis sûr.
                </button>
                <button data-modal-hide="popup-modal-delete" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non, annuler.</button>
            </div>
        </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>
</html>
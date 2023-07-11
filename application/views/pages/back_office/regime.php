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
        <button id="btn-update" class="hover:bg-[#92afff] bg-[#7fa1ff] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
          Ajouter  
        </button>
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
                      <button id="btn-update" class="hover:bg-[#40c4d8] bg-[#39AEC0] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
                        Modifier  
                      </button>
                      <button id="btn-delete" class="hover:bg-[#ff9a9a] bg-[#ff7e7e] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
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
                      <button id="btn-update" class="hover:bg-[#40c4d8] bg-[#39AEC0] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
                        Modifier  
                      </button>
                      <button id="btn-delete" class="hover:bg-[#ff9a9a] bg-[#ff7e7e] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
                        Supprimer  
                      </button>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>

  </main>

</body>
</html>
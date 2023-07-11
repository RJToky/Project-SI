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

    <div class="relative overflow-x-auto mb-10">
        <h2 class="mb-3 text-xl font-medium text-[#39AEC0]">Liste des derniers transactions</h2>
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
                    <th scope="col" class="px-6 py-3">
                        Date de transaction
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix
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
                    <td class="px-6 py-4">
                        12/12/2012
                    </td>
                    <td class="px-6 py-4">
                        100000 Ar
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
                    <td class="px-6 py-4">
                        12/12/2012
                    </td>
                    <td class="px-6 py-4">
                        100000 Ar
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

  </main>
</body>
</html>
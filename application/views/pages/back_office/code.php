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
      <div class="relative overflow-x-auto mb-10">
          <h2 class="mb-3 text-xl font-medium text-[#39AEC0]">Validation des codes</h2>
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                      Nom d'utilisateur
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Code
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Montant
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Action
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php for($i = 0; $i < count($list); $i++) { ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $list[$i]["prenomuser"] ?>
                    </th>
                    <td class="px-6 py-4">
                    <?= $list[$i]["numerocode"] ?>

                    </td>
                    <td class="px-6 py-4">
                    <?= $list[$i]["montantcode"] ?>

                    </td>
                    <td class="px-6 py-4">
                      <a href="<?= base_url('C_Admin/validerCode/' . $list[$i]['idcode'] . "/" . $list[$i]['iduser'] . "/" . $list[$i]['montantcode'] ) ?>" id="btn-update" class="hover:bg-[#40c4d8] bg-[#39AEC0] transition-all duration-300 px-4 py-2 text-center font-semibold text-white focus:outline-none">
                        Valider
                      </a>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
      </div>
    </div>
    
  </main>

</body>
</html>
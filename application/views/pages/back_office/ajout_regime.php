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

    <div class="mt-4 flex flex-col items-center">
      <h2 class="mb-10 text-3xl font-medium text-[#39AEC0]">Ajouter régime</h2>

      <form id="form-add" class="w-[525px] shadow-xl rounded-lg  bg-white p-6" action="#" method="post">
        
        <div class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">

          <div class="flex flex-col gap-2">
            <label class="text-gray-500 text-lg font-semibold">Entrer le nom:</label>
            <input required name="nom" class="w-full text-lg px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="text" placeholder="Papaye à la tantely">
          </div>

          <div class="flex flex-col gap-2">
            <label class="text-gray-500 text-lg font-semibold">Entrer l'objectif:</label>
            <select required class="w-full text-lg px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" name="obj" id="">
              <option value="1">Augmenter</option>
              <option value="2">Réduire</option>
            </select>
          </div>

          <div class="flex flex-col gap-2">
            <label class="text-gray-500 text-lg font-semibold">Poids:</label>
            <input required name="" class="w-full text-lg px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="number" placeholder="50 Kg">
          </div>

          <div class="flex flex-col gap-2">
            <label class="text-gray-500 text-lg font-semibold">à</label>
            <input required name="" class="w-full text-lg px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="number" placeholder="45 Kg">
          </div>

          <div class="flex flex-col gap-2">
            <label class="text-gray-500 text-lg font-semibold">Prix:</label>
            <input required name="" class="w-full text-lg px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="number" placeholder="500000 Ar">
          </div>

          <div class="flex flex-col gap-2">
            <label class="text-gray-500 text-lg font-semibold">pour</label>
            <input required name="" class="w-full text-lg px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="number" placeholder="7 jours">
          </div>

          <div class="sm:col-span-2">
            <button id="btn-submit" type="submit" class="hover:bg-[#40c4d8] transition-all duration-300 w-full px-4 py-2 rounded-full bg-[#39AEC0] text-center font-semibold text-white text-lg focus:outline-none">
              <span class="hidden flex justify-center items-center">
                <div class="animate-spin rounded-full h-8 w-8 border-r-2 border-b-4 border-white"></div>
              </span>
              <span class="">Ajouter</span>
            </button>
          </div>
        
        </div>

      </form>
    </div>
    
  </main>

</body>
</html>
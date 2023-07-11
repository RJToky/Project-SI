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
    <h1 class="mb-6 text-3xl font-semibold text-gray-600">Suggestions de régime</h1>

    <div class="flex flex-wrap gap-10">

    <?php for($i = 0; $i < count($suggestions); $i++) { ?>
    <!-- Item container -->
      <div id="item" class="w-[300px] shadow-2xl h-fit rounded-md overflow-hidden">

        <div id="default-carousel" class="relative w-full" data-carousel="slide">
          <!-- Carousel wrapper -->
          <div class="relative h-48 overflow-hidden">
            
          <?php for($j = 0; $j < count($suggestions[$i]["listphoto"]); $j++) { ?>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?php echo base_url("assets/img/" . $suggestions[$i]["listphoto"][$j]); ?>" class="absolute block w-full top-0 left-0" alt="...">
            </div>
          <?php } ?>
         </div>
         <!-- Slider indicators -->
          <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
              <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
              <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
              <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
              <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
              <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
          </div>
          <!-- Slider controls -->
          <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
              <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                  <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                  </svg>
                  <span class="sr-only">Previous</span>
              </span>
          </button>
          <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
              <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                  <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <span class="sr-only">Next</span>
              </span>
          </button>
        </div>

        <div class="flex flex-col">
          <div class="grid grid-cols-3">
            <span class="text-gray-600 py-4 text-center border-r-2 border-r-slate-200 font-semibold"><?php if($suggestions[$i]["idobjectif"] == 1) { echo "Poids +"; } else { echo "Poids -"; } ?></span>
            <span class="text-gray-600 py-4 text-center border-r-2 border-r-slate-200 font-semibold"><?= $suggestions[$i]["duree"] ?> jours</span>
            <span class="text-gray-600 py-4 text-center font-semibold"><?= $suggestions[$i]["prix"]; ?> Ar</span>
          </div>
          <div class="flex justify-center">
            <a href="<?= base_url("C_Home/detail_regime/" . $suggestions[$i]["idregime"]); ?>" class="bg-[#39AEC0] hover:bg-[#40c4d8] transition-all duration-300 w-full px-4 py-4 text-center font-semibold text-white text-md focus:outline-none">
              Voir détail &rarr;
            </a>
          </div>
        </div>

      </div>
    <!-- End Item container -->
    <?php } ?>

    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>
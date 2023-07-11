<header class="flex rounded-md shadow-md w-full items-center bg-white mt-4 p-5">
  <h1 class="font-bold text-gray-600 text-3xl mr-auto"><?= $page ?></h1>
  <a href="#" id="profil" class="flex gap-4 items-center mr-4 px-5 py-2 bg-gray-100 rounded-full text-gray-600">
    <span class="w-7 h-7">
      <img class="w-7" src="<?= base_url("assets/img/user-5-svgrepo-com.svg") ?>" alt="">
    </span>
    <span class="text-lg">
      Admin
    </span>
  </a>
  <a href="<?= base_url("C_Admin/deconnection") ?>" class="bg-[#39AEC0] hover:bg-[#40c4d8] transition-all duration-300 text-white px-5 py-2">Déconnexion</a>
</header>
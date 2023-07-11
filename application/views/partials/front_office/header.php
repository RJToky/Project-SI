<header class="fixed z-50 top-0 left-0 flex rounded-md shadow-sm w-full items-center bg-[#fffffff7] px-36 py-3">
  <a href="#" class="text-[#39AEC0] text-4xl font-bold text-center mr-auto" style="font-family: 'Birica';">Asio'Rezim</a>
  <nav class="flex mr-4 gap-4">
    <a href="<?= base_url("C_Home/index"); ?>" class="text-gray-500 font-medium hover:text-[#39AEC0]">Suggestions</a>
    <a href="<?= base_url("C_Home/wallet"); ?>" class="text-gray-500 font-medium hover:text-[#39AEC0]">Porte Monnaie</a>
  </nav>
  <a href="#" id="profil" class="flex gap-4 items-center mr-4 px-5 py-2 bg-gray-100 rounded-full text-gray-600">
    <span class="w-7 h-7">
      <img class="w-7" src="<?= base_url("assets/img/user-5-svgrepo-com.svg") ?>" alt="">
    </span>
    <span class="text-lg">
      <?= $this->session->userdata("prenom") ?>
    </span>
  </a>
  <a href="<?= base_url("C_Home/deconnection") ?>" class="bg-[#39AEC0] hover:bg-[#40c4d8] transition-all duration-300 text-white px-5 py-2">Déconnexion</a>
</header>
<div class="h-[64px] w-full"></div>
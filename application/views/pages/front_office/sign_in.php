<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AsioRezim</title>
	<link href="https://fonts.cdnfonts.com/css/birica" rel="stylesheet">
	<link href="https://fonts.cdnfonts.com/css/hai-eisya" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url("assets/css/output.css"); ?>">
</head>
<body class="h-full flex">
	<div class="w-1/2" style="background: url('<?php echo base_url(); ?>assets/img/bg-sakafo-login.jpg');">
		<div class="bg-[#111622] flex m-auto items-center h-full" style="--tw-bg-opacity: 0.8;">
			<div class="flex m-auto w-[70%] flex-col">
				<h2 class="text-white text-6xl mb-5" style="font-family: 'Hai Eisya';">Bienvenue</h2>
				<h2 class="text-[#39AEC0] text-7xl mb-5 font-bold" style="font-family: 'Birica';">Asio Rezim</h2>
				<p class="text-white text-lg leading-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quidem totam et nulla voluptatem laboriosam debitis, nemo dicta</p>
			</div>
		</div>
	</div>
	<div class="w-1/2 flex items-center justify-center flex-col">
		<h2 class="text-[#39AEC0] text-5xl font-bold mb-5">Se connecter</h2>
		<form id="form-login" class="flex flex-col w-1/2" action="#" method="post">
			<div class="p-4 flex flex-col gap-2">
				<label class="text-gray-400 text-lg font-semibold">Entrer votre email:</label>
				<input class="w-full text-lg h-14 px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="email" placeholder="example@example.com">
			</div>
			<div class="p-4">
				<label class="text-gray-400 text-lg font-semibold">Entrer votre mot de passe:</label>
				<input class="w-full text-lg h-14 px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="password" placeholder="Mot de passe">
			</div>
			<div class="p-4">
			<button type="submit" class="hover:bg-[#2e8c9b] w-full h-14 px-4 py-2 rounded-full bg-[#39AEC0] text-center font-semibold text-white text-lg">Se connecter</button>
			</div>
		</form>
	</div>
	<script></script>
</body>
</html>

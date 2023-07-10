<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asio Rezim</title>
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
		<h2 class="text-[#39AEC0] text-5xl font-bold mb-5">Connexion</h2>
		<form id="form-login" class="flex flex-col w-1/2" action="#" method="post">
			<div class="p-4 flex flex-col gap-2">
				<label class="text-gray-500 text-lg font-semibold">Entrer votre email:</label>
				<input required name="mail" class="w-full text-lg h-12 px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="email" placeholder="example@example.com">
			</div>
			<div class="p-4 flex flex-col gap-2">
				<label class="text-gray-500 text-lg font-semibold">Entrer votre mot de passe:</label>
				<input required name="mdp" class="w-full text-lg h-12 px-6 py-2 rounded-full bg-[#F6F6F6] focus:outline-none text-gray-500" type="password" placeholder="Mot de passe">
			</div>
			<div class="p-4">
				<button id="btn-submit" type="submit" class="hover:bg-[#2e8c9b] w-full h-12 px-4 py-2 rounded-full bg-[#39AEC0] text-center font-semibold text-white text-lg focus:outline-none">
					<span class="hidden flex justify-center items-center">
  					<div class="animate-spin rounded-full h-8 w-8 border-r-2 border-b-4 border-white"></div>
					</span>
					<span class="">Se connecter</span>
				</button>
			</div>
			<a href="<?= base_url("C_Index/register") ?>" style="text-decoration: underline; color: #39AEC0;" class="p-4 text-center text-lg">
				J'ai pas encore du compte!
			</a>
		</form>
	</div>

	<div id="toast-danger" class="hidden fixed top-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div id="message-error" class="ml-3 text-sm font-normal"></div>
    <button id="button-close" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script>
		$(document).ready(() => {
			$("#form-login").submit((e) => {
				e.preventDefault();
				$("#btn-submit span:nth-child(1)").removeClass("hidden");
				$("#btn-submit span:nth-child(2)").addClass("hidden");
				var formData = new FormData(document.getElementById("form-login"));

				$.ajax({
					method: "POST",
					url: "<?= base_url("C_User/login") ?>",
					data: formData,
					processData: false,
					contentType: false,
					success: (response) => {
						let res = JSON.parse(response);
						if(res.response === "success") {
							window.location.href = "<?= base_url("C_Home") ?>";
						} else if (res.response === "error") {
							$("#message-error").text(res.message);
							$("#toast-danger").removeClass("hidden");
						}
						$("#btn-submit span:nth-child(1)").addClass("hidden");
						$("#btn-submit span:nth-child(2)").removeClass("hidden");
					},
				});
			});

			$("#button-close").click(() => {
				$("#toast-danger").addClass("hidden");
			});
		});
	</script>
</body>
</html>

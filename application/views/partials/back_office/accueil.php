<div class="flex flex-col rounded-md w-full items-center mt-4">

  <div id="tableau-bord" class="grid grid-cols-4 w-full gap-x-4 mb-4">
    <div class="shadow-md rounded-md bg-white p-6 text-center">
      <h3 class="font-semibold text-[#39AEC0] text-2xl mb-5">Chiffres d'affaire</h3>
      <span class="font-medium text-gray-600 text-xl">1750000 Ar</span>
    </div>
    <div class="shadow-md rounded-md bg-white p-6 text-center">
      <h3 class="font-semibold text-[#39AEC0] text-2xl mb-5">Nombres d'utilisateur</h3>
      <span class="font-medium text-gray-600 text-xl">17 personnes</span>
    </div>
    <div class="shadow-md rounded-md bg-white p-6 text-center">
      <h3 class="font-semibold text-[#39AEC0] text-2xl mb-5">Manihena taolana</h3>
      <span class="font-medium text-gray-600 text-xl">12 personnes</span>
    </div>
    <div class="shadow-md rounded-md bg-white p-6 text-center">
      <h3 class="font-semibold text-[#39AEC0] text-2xl mb-5">Manatavy tena</h3>
      <span class="font-medium text-gray-600 text-xl">5 personnes</span>
    </div>
  </div>

  <div id="statistique" class="grid grid-cols-2 w-full gap-x-4 mb-4">
    <div class="shadow-md rounded-md bg-white p-6 overflow-hidden">
      <canvas id="graphe-1" style="width:100%; max-width:700px"></canvas>
      <div class="font-semibold text-gray-500 text-2xl text-center mt-4">Statistique de chiffre d'affaire</div>
    </div>
    <div class="shadow-md rounded-md bg-white p-6">
      <canvas id="graphe-2" style="width:100%; max-width:700px"></canvas>
      <div class="font-semibold text-gray-500 text-2xl text-center mt-4">Gain et Perte moyenne poids</div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script>
  const graphe1 = document.getElementById("graphe-1").getContext('2d');
  const graphe2 = document.getElementById("graphe-2").getContext('2d');

  const data = [
    {x:50, y:7},
    {x:60, y:8},
    {x:70, y:8},
    {x:80, y:9},
    {x:90, y:9},
    {x:100, y:9},
    {x:110, y:10},
    {x:120, y:11},
    {x:130, y:14},
    {x:140, y:14},
    {x:150, y:15}
  ];

  new Chart(graphe1, {
    type: "scatter",
    data: {
    datasets: [{
      pointRadius: 4,
      pointBackgroundColor: "#111622",
      data: data
    }]
    },
  });

  const xValues = [50,60,70,80,90,100,110,120,130,140,150];

  new Chart(graphe2, {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
        borderColor: "#111622",
        fill: false
      },{
        data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
        borderColor: "#39AEC0",
        fill: false
      }]
    },
  });

</script>
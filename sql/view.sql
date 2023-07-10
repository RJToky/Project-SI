select regime.* , detailregimeplat.*
from regime
join detailregimeplat on detailregimeplat.idregime = regime.idregime
join plat on plat.idplat 
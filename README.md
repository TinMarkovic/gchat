# gchat
Chat program za zeleni tim - Green Chat


Moramo uraditi user operacije, dodati role i dodati permisije. To znači i napraviti token pregled i autentikaciju. 

Od sad radimo na sistemu 2 gledaju 1.

Deadline je do srijede.



***

Izbaciti unutar user kontrolera CRUD - prebaciti ga u model. +++
updateali smo UserController i User php

Napraviti objekt User koji koristimo u svim metodama. +++
U ova dva gore je sada rješeno pitanje objekta i isti se koristi svuda.

Napraviti osnovne CRUD operacije za Role & Permission. (uz to Model i controller)

((Raditi sa manje kontrolera koji rade više poslova.))

Napraviti session autentikaciju. 

Napraviti demo viewe.


----------


U modelu baze izbaciti polje permission iz tabele role. 


----

SQL working stuff

SELECT role.id, role.name, role.status
FROM role
INNER JOIN userRole
ON role.id=userRole.roleId
WHERE userRole.userId = 1;

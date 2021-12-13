CUCCATO MATTIA [simulazione_joffer]
#
FRONT-END -> VueJS -> client

BACK-END -> Laravel -> server

database ->simulazione_joffer
#
ESECUZIONE:

client -> npm run serve / yarn serve

server -> php artisan serve
#
ROUTE:

/list -> visualizza tutte le offerte

/detail/{id} -> visualizza il dettaglio di un' offerta

/create -> inserisce una nuova offerta

/update -> modifica un'offerta selezionata
#
ENDPOINT BACK-END:

/list -> ritorna la lista delle offerte

/detail/{id} -> ritorna il dettaglio completo di un'offerta

/insert -> inserisce una nuova offerta

/update/{id} -> permette la modifica di un'offerta, precuperata dall'id

/delete/{id} -> permette di eliminare un'offerta

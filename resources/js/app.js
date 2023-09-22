import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


/** VALIDAZIONE FRONT-END TIPOLOGIE SELEZIONATE DURANTE CREATE_RESTAURANT_FORM ********************************/

// CONTROLLO CHE IL CREATE_RESTAURANT_FORM ESISTE
if (document.getElementById('createRestaurantForm') !== null) {

    // SELEZIONO IL CREATE_RESTAURANT_FORM, E GLI AGGIUNTO UN EVENT_LISTENER SUBMIT_FORM
    document.getElementById('createRestaurantForm').addEventListener('submit', function (event) {

        // SELEZIONO TUTTI GLI INPUT CHECKBOX DELLE TIPOLOGIE
        var checkboxes = document.querySelectorAll('input[name="types[]"]:checked');

        if (checkboxes.length === 0) { // NESSUNA TIPOLOGIA SELEZIONATA, MOSTRA UN MESSAGGIO DI ERRORE

            document.getElementById('createRestaurantTypeError').textContent = 'Devi selezionare almeno una Tipologia';

            // IMPEDISCE L'INVIO DEL CREATE_RESTAURANT_FORM
            event.preventDefault();

        } else { // ALMENO UNA TIPOLOGIA SELEZIONATA, CANCELLA EVENTUALI MESSAGGI DI ERRORE

            document.getElementById('createRestaurantTypeError').textContent = '';
        }
    });
}


/** VALIDAZIONE FRONT-END TIPOLOGIE SELEZIONATE DURANTE EDIT_RESTAURANT_FORM ********************************/

// CONTROLLO CHE L'EDIT_RESTAURANT_FORM ESISTE
if (document.getElementById('editRestaurantForm') !== null) {

    // SELEZIONO L'EDIT_RESTAURANT_FORM, E GLI AGGIUNTO UN EVENT_LISTENER SUBMIT_FORM
    document.getElementById('editRestaurantForm').addEventListener('submit', function (event) {

        // SELEZIONO TUTTI GLI INPUT CHECKBOX DELLE TIPOLOGIE
        var checkboxes = document.querySelectorAll('input[name="types[]"]:checked');

        if (checkboxes.length === 0) { // NESSUNA TIPOLOGIA SELEZIONATA, MOSTRA UN MESSAGGIO DI ERRORE

            document.getElementById('editRestaurantTypeError').textContent = 'Devi selezionare almeno una Tipologia';

            // IMPEDISCE L'INVIO DELL'EDIT_RESTAURANT_FORM
            event.preventDefault();

        } else { // ALMENO UNA TIPOLOGIA SELEZIONATA, CANCELLA EVENTUALI MESSAGGI DI ERRORE

            document.getElementById('editRestaurantTypeError').textContent = '';
        }
    });
}


/** MODALE BOOTSTRAP CANCELLAZIONE PRODOTTO DEL RISTORANTE ********************************/


// RECUPERO TUTTI I DELETE_BUTTON DI OGNI PRODOTTO
const productDeleteButton = document.querySelectorAll('.product-delete-button');

// CICLO L'ARRAY CONTENENTE TUTTI I DELETE_BUTTON
productDeleteButton.forEach((button) => {

    // PER OGNI DELETE_BUTTON, AGGIUNGO UN EVENT_LISTENER "CLICK"
    button.addEventListener('click', (event) => {

        // QUANDO L'UTENTE CLICCA SUL DELETE_BUTTON, IL FORM NON VIENE AVVIATO GRAZIE A QUESTO COMANDO
        event.preventDefault();

        // QUANDO L'UTENTE CLICCA SUL DELETE_BUTTON, MI VIENE PASSATO UN DATA ATTRIBUTE, LO RECUPERO TRAMITE QUESTA STRINGA
        const productName = button.getAttribute('data-product-name');

        // RECUPERO IL TAG HTML DELLA MODALE DOVE INSERIRE IL DATA ATTRIBUTE RECUPERATO PRIMA
        const modalProductName = document.getElementById('modal-product-name');

        // INSERISCO IL DATA ATTRIBUTE DENTRO IL "MODAL_PRODUCT_NAME"
        modalProductName.innerText = productName;

        // RECUPERO L'HTML DELLA MODALE "MODAL_PRODUCT_DELETE", DALLA VIEW ADMIN -> PARTIALS
        const modal = document.getElementById('productConfirmDeleteModal');

        // CREO LA MODALE COME OGGETTO DI BOOTSTRAP, PARTENDO DALL'HTML DELLA MODALE RECUPERATA PRIMA
        const bootstrapModal = new bootstrap.Modal(modal);

        // QUANDO L'UTENTE CLICCA NEL DELETE_BUTTON, MOSTRO LA "BOOTSTRAP_MODAL"
        bootstrapModal.show();

        // RECUPERO IL PULSANTE DI "CONFERMA CANCELLAZIONE" PRESENTE NELLA MODALE
        const productConfirmDeleteButton = document.getElementById('product-confirm-delete-button');

        // AL PULSANTE DI "CONFERMA CANCELLAZIONE", AGGIUNGO UN EVENT_LISTENER "CLICK"
        productConfirmDeleteButton.addEventListener('click', () => {

            // QUANDO L'UTENTE CLICCA IL PULSANTE DI "CONFERMA CANCELLAZIONE", RECUPERO IL "DELETE_BUTTON", ED ESEGUO LA FORM DI CANCELLAZIONE
            button.submit();
        })
    })
})
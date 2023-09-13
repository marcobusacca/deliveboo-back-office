import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// RECUPERO TUTTI I DELETE_BUTTON DI OGNI ""
const objectDeleteButton = document.querySelectorAll('.object-delete-button');

// CICLO L'ARRAY CONTENENTE TUTTI I DELETE_BUTTON
objectDeleteButton.forEach((button) => {

    // PER OGNI DELETE_BUTTON, AGGIUNGO UN EVENT_LISTENER "CLICK"
    button.addEventListener('click', (event) => {

        // QUANDO L'UTENTE CLICCA SUL DELETE_BUTTON, IL FORM NON VIENE AVVIATO GRAZIE A QUESTO COMANDO
        event.preventDefault();

        // QUANDO L'UTENTE CLICCA SUL DELETE_BUTTON, MI VIENE PASSATO UN DATA ATTRIBUTE, LO RECUPERO TRAMITE QUESTA STRINGA
        const objectName = button.getAttribute('data-object-name');

        // RECUPERO IL TAG HTML DELLA MODALE DOVE INSERIRE IL DATA ATTRIBUTE RECUPERATO PRIMA
        const modalObjectName = document.getElementById('modal-object-name');

        // INSERISCO IL DATA ATTRIBUTE DENTRO IL "MODAL_OBJECT_NAME"
        modalObjectName.innerText = objectName;

        // RECUPERO L'HTML DELLA MODALE "MODAL_OBJECT_DELETE", DALLA VIEW ADMIN -> PARTIALS
        const modal = document.getElementById('objectConfirmDeleteModal');

        // CREO LA MODALE COME OGGETTO DI BOOTSTRAP, PARTENDO DALL'HTML DELLA MODALE RECUPERATA PRIMA
        const bootstrapModal = new bootstrap.Modal(modal);

        // QUANDO L'UTENTE CLICCA NEL DELETE_BUTTON, MOSTRO LA "BOOTSTRAP_MODAL"
        bootstrapModal.show();

        // RECUPERO IL PULSANTE DI "CONFERMA CANCELLAZIONE" PRESENTE NELLA MODALE
        const objectConfirmDeleteButton = document.getElementById('object-confirm-delete-button');

        // AL PULSANTE DI "CONFERMA CANCELLAZIONE", AGGIUNGO UN EVENT_LISTENER "CLICK"
        objectConfirmDeleteButton.addEventListener('click', () => {

            // QUANDO L'UTENTE CLICCA IL PULSANTE DI "CONFERMA CANCELLAZIONE", RECUPERO IL "DELETE_BUTTON", ED ESEGUO LA FORM DI CANCELLAZIONE
            button.submit();
        })
    })
})
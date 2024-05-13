

$(document).ready(function () {
    var comuna = $('#comuna');

    $('#region').change(function () {
        var region = $(this).val();

        $.ajax({
            data: { region: region },
            dataType: 'html',
            type: 'POST',
            url: 'datos.php',

        }).done(function (data) {
            console.log(data);
            comuna.html(data);
        });
    });
});

window.onload = function () {
    const rut = document.getElementById('rut')
    const alias = document.getElementById('alias')
    const cbEntero = document.querySelectorAll('input[type=checkbox][name=entero]');
    const form = document.querySelector('form');
    form.onsubmit = function (event) {
        //expresión regular para validar el campo rut en formato chileno.
        const regEx = /^[0-9]{1,2}\.[0-9]{3}\.[0-9]{3}-[0-9Kk]$/;
        if (regEx.test(rut.value)) {
            alert('Por favor, ingrese un rut válido.');
            event.preventDefault();
            return false;
        }

        if (alias.value.length < 5) {
            alert('Por favor, ingrese un Alias de al menos 5 caracteres.');
            event.preventDefault();
            return false;
        }

        let cbCount = 0;
        for (let i = 0; i < cbEntero.length; i++) {
            if (cbEntero[i].checked) {
                cbCount++
            }
        }
        if (cbCount < 2) {
            alert('Por favor, seleccione 2 ó más opciones de "Cómo se enteró de nosotros..."');
            event.preventDefault();
            return false;
        }
    }




}

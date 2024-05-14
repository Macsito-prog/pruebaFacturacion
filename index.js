

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

function validarEmail() {
    var emailInput = document.getElementById('email').value;
    var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  
    if (!pattern.test(emailInput)) {
      alert('Por favor, introduce una dirección de correo electrónico válida.');
      setTimeout(function() {
        document.getElementById('email').focus();
      }, 0); 
    }
  }

  function calculoRut(rut) {
    // Primero, removemos cualquier guion y espacio en blanco del RUT
    rut = rut.replace(/\./g, '').replace(/\-/g, '').trim();

    // Luego, dividimos el RUT en número y dígito verificador
    var numero = rut.slice(0, -1);
    var dv = rut.slice(-1).toUpperCase();

    // Validamos que el número tenga al menos un dígito y que el dígito verificador sea 0-9 o 'K'
    if (numero.length < 1 || !/^[0-9K]$/.test(dv)) {
        return false;
    }

    // Calculamos el dígito verificador esperado
    var suma = 0;
    var multiplo = 2;
    for (var i = numero.length - 1; i >= 0; i--) {
        suma += parseInt(numero.charAt(i)) * multiplo;
        if (multiplo < 7) {
            multiplo += 1;
        } else {
            multiplo = 2;
        }
    }

    var dvEsperado = 11 - (suma % 11);
    if (dvEsperado == 11) {
        dvEsperado = 0;
    } else if (dvEsperado == 10) {
        dvEsperado = 'K';
    }

    // Validamos el dígito verificador ingresado con el esperado
    if (dv != dvEsperado) {
        return false;
    }

    return true;
}

function validarRut() {
    var rutInput = document.getElementById('rut').value;

    if (!calculoRut(rutInput)) {
        alert('Por favor, introduce un RUT chileno válido.');
        setTimeout(function() {
            document.getElementById('rut').focus();
        }, 0);
    }
}


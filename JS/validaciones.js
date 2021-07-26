function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function validaciones() {
    var retorno = false;
    try {
    var nombrePersona = document.getElementById('nombrePersona').value;
    var apellido2 = document.getElementById('apellido1').value;
    var apellido2 = document.getElementById('apellido2').value;
    var cedula = document.getElementById('cedula').value;
    var telefono = document.getElementById('telefono').value;
    var email= document.getElementById('email').value;

    //obtiene información del destino
    var elComboDestino= document.getElementById("idDestino");
    var idDestino= elComboDestino.options[elComboDestino.selectedIndex].value;
    var nombreDestino= elComboDestino.options[elComboDestino.selectedIndex].text;

    //obtiene información del día
    var elComboDia = document.getElementById("idDia");
    var idDia = elComboDia.options[elComboDia.selectedIndex].value;
    var dia = elComboDia.options[elComboDia.selectedIndex].text;

    //obtiene información del mes
    var elComboMes = document.getElementById("idMes");
    var idMes = elComboMes.options[elComboMes.selectedIndex].value;
    var mes = elComboMes.options[elComboMes.selectedIndex].text;

    //Obtiene la hora seleccionada.
    var hora = document.getElementsByName('hora');
    var valHora;
    for (var i = 0, len = hora.length; i < len; i++) {
        if (hora[i].checked) { // radio checked?
            valHora = hora[i].value; // if so, hold its value in val
            break; // and break out of for loop
        }
    }

    //obtiene el dato del padecimiento
    var padecimiento = document.getElementById('padecimiento').value;

    //Almacena la información de la persona en cookies
    setCookie("nombrePersona", nombrePersona, 30);

    //Almacena la información de la hora y padecimient en variables de sesion
    sessionStorage.setItem("Hora", hora);
    sessionStorage.setItem("Padecimiento", padecimiento);

    //Almacena la información del día y doctor en localStorage
    localStorage.setItem("idDia", idDia);
    localStorage.setItem("dia", dia);
    localStorage.setItem("idMes", idMes);
    localStorage.setItem("mes", mes);
    localStorage.setItem("idDestino", idDestino);
    localStorage.setItem("nombreDestino", nombreDestino);

    //Cuando se ejecuta un evento submit y el resultado de la función javaScript es true
    //La información se envía al servidor, caso contrario no se realiza el envió al servidor.aviso
    retorno = true;

    } catch (error) {
        retorno = false;
    }
    
    return retorno

}
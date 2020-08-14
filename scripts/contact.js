function validation() {
    var fname = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var service = document.getElementById("service").value;
    var subject = document.getElementById("subject").value;
    var error_message = document.getElementById("error_message");

    var text;

    error_message.style.padding = "10px";
    
    if (fname.length < 6) {
        text = "INSIRA UM NOME VÁLIDO.";
        error_message.innerHTML = text;
        return false;
    }
    if (email.indexOf("@") == -1 || email.length < 6){
        text = "INSIRA UM E-MAIL VÁLIDO.";
        error_message.innerHTML = text;
        return false;
    }

    if (subject.length < 20) {
        text = "DESCREVA MAIS O QUE DESEJA.";
        error_message.innerHTML = text;
        return false;
    }
    alert("CONTATO ENVIADO COM SUCESSO!");
    return true;
}
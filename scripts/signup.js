let errors = {
    name: false,
    surname: false,
    email: false,
    username: false,
    password: false
};

function checkName(event){
    const Check = event.currentTarget;

    if(Check.value.length == 0){
        document.querySelector('#nome').textContent = "Questo campo non può essere vuoto";
        errors.name = false;
    } else {
        document.querySelector('#nome').innerHTML = "";
        errors.name = true;
    }
}


function checkEmail(event) {
    const Check = event.currentTarget;

    if(Check.value.length == 0){
        document.querySelector('#email').textContent = "Questo campo non può essere vuoto";
        errors.email = false;
    } else if(!(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/).test(Check.value)){
        document.querySelector('#email').textContent = "Email non valida";
        errors.email = false;
    }
     else {
        document.querySelector('#email').innerHTML = "";
        errors.email = true;
    }
}

function checkUsername(event) {
    const Check = event.currentTarget;

    if(Check.value.length == 0){
        document.querySelector('#username').textContent = "Questo campo non può essere vuoto";
        errors.username = false;
    } else {
        document.querySelector('#username').innerHTML = "";
        errors.username = true;
    }
}

function checkPassword(event) {
    const Check = event.currentTarget;

    if(Check.value.length == 0){
        document.querySelector('#password').textContent = "Questo campo non può essere vuoto";
        errors.password = false;
    } else if(Check.value.length < 8){
        document.querySelector('#password').textContent = "La password deve contenere almeno 8 caratteri";
        errors.password = false;
    } else {
        document.querySelector('#password').innerHTML = "";
        errors.password = true;
    }
}


function submit(event){
        
    let countTrue = 0;
    for(const error in errors){
        if(errors[error] == true){
            countTrue++;
        }
    }
    if(countTrue != 5){
        event.preventDefault();
        if(Nome.value.length == 0) document.querySelector('#nome').textContent = "Questo campo non può essere vuoto";
        if(Cognome.value.length == 0) document.querySelector('#cognome').textContent = "Questo campo non può essere vuoto";
        if(Email.value.length == 0) document.querySelector('#email').textContent = "Questo campo non può essere vuoto";
        if(Username.value.length == 0) document.querySelector('#username').textContent = "Questo campo non può essere vuoto";
        if(Password.value.length == 0) document.querySelector('#password').textContent = "Questo campo non può essere vuoto";
    }
}

document.querySelector('#nome').addEventListener('blur', checkName);
document.querySelector('#cognome').addEventListener('blur', checkName);
document.querySelector('#username').addEventListener('blur', checkUsername);
document.querySelector('#email').addEventListener('blur', checkEmail);
document.querySelector('#password').addEventListener('blur', checkPassword);

if (document.querySelector('.error') !== null) {
    checkUsername(); checkPassword(); checkConfirmPassword(); checkEmail();
    document.querySelector('#nome').dispatchEvent(new Event('blur'));
    document.querySelector('#cognome').dispatchEvent(new Event('blur'));
}
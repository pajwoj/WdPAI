const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const passwordConfirmInput = form.querySelector('input[name="passwordConfirm"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsIdentical(password, passwordConfirm) {
    return password === passwordConfirm;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('notValid') : element.classList.remove('notValid');
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsIdentical(
                passwordConfirmInput.previousElementSibling.value,
                passwordConfirmInput.value
            );
            markValidation(passwordConfirmInput, condition);
        },
        1000
    );
}

emailInput.addEventListener('keyup', validateEmail);
passwordConfirmInput.addEventListener('keyup', validatePassword);
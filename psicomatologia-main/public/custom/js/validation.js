function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validateString(input) {
    const re = /^[A-Za-z]+$/;
    return re.test(input);
}

function validateNumeric(input) {
    const re = /^[0-9]+$/;
    return re.test(input);
}

function validateAlphanumeric(input) {
    const re = /^[0-9a-zA-Z]+$/;
    return re.test(input);
}

function validateDate(input) {
    const re = /^\d{4}-\d{2}-\d{2}$/;
    return re.test(input);
}

function validateTime(input) {
    const re = /^([01]\d|2[0-3]):([0-5]\d)$/;
    return re.test(input);
}

function validateTelephone(input) {
    const re = /^\d{7}$/; // Assuming 10 digit phone number
    return re.test(input);
}

function validateNumberOfDigits(number, n) {
    const numberString = number.toString();
    return numberString.length > n;
}

function validateRadioButton(radioGroupName) {
    const radios = document.getElementsByName(radioGroupName);
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            return true;
        }
    }
    return false;
}

function validateSelect(selectId) {
    const select = document.getElementById(selectId);
    return select.value !== "";
}

function validateArray(value, array) {
    return array.includes(value);
}

function validateFloat(input) {
    return !isNaN(parseFloat(input));
}

function validateGreaterThan(value, threshold) {
    return parseFloat(value) > threshold;
}

function validateNotEmpty(inputValue) {
    return inputValue.trim() !== '';
}

function validateEmpty(inputValue) {
    return inputValue.trim() === '';
}

function validateMaxLength(inputValue, maxLength) {
    return inputValue.length <= maxLength;
}

function validateMinLength(inputValue, minLength) {
    return inputValue.length >= minLength;
}

function validateButtonSelection(nameButton) {
    return buttonServicio.id != '';
}
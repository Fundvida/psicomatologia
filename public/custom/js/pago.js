document.addEventListener('DOMContentLoaded', function () {
    const options = document.querySelectorAll('.option');
    let i=0;
    // Evitar que los clics dentro de las opciones se propaguen
    options.forEach(option => {
        const radioInput = option.querySelector('input[type="radio"]');
        option.addEventListener('click', function (e) {
            //e.stopPropagation(); // Evita que el clic se propague al documento
            //e.stopImmediatePropagation();
            if (radioInput) {
                const radioValue = radioInput.value;
                // console.log("Selected value:", radioValue);
                tipoPago=radioValue;
                
            }

            e.stopPropagation();
        });
    });

    // Agregar evento de clic al documento
    document.addEventListener('click', function (e) {
        const isClickOutsideOptions = !e.target.closest('.option');
        if (isClickOutsideOptions) {
            // Deseleccionar todos los radios
            const radios = document.querySelectorAll('.option input[type="radio"]');
            radios.forEach(radio => {
                radio.checked = false;
            });
        }
    });
});

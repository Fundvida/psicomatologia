let currentTab = 0;
const buttonServicio = {
    id: '',
    text: ''
};
const psicologos = [];
let selectedHorarios = [];
let selectedPsicologo = [];
let tipoPago = '';
let dataToSend = {
    name: '',
    apellidos: '',
    password: '',
    email: '',
    telefono: '',
    servicio: '',
    psicologo_id: '',
    fecha_hora_inicio: '',
    fecha_hora_fin: '',
    turno: '',
    dia: '',
    adicional_info: '',
    pago_tipo: '',
}
tabShow(currentTab);

const guardarHorario = (turno, dia, hora_inicio, hora_fin, titulo) => {
    if(titulo != "No disponible"){    
        selectedHorarios = {
            turno: turno,
            dia: dia,
            fecha_hora_inicio: hora_inicio,
            fecha_hora_fin: hora_fin,
        };
        console.log(selectedHorarios);
    }
}
function tabShow(n) {
    var x = document.getElementsByClassName("step");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == 3) {
        displayCalendar(selectedPsicologo?.id);
        console.log("bonito");
    }
    if (n == 6) {

        nombreR = document.getElementById('nombreR');
        apellidoR = document.getElementById('apellidoR');
        emailR = document.getElementById('emailR');
        celularR = document.getElementById('celularR');
        servicioR = document.getElementById('servicioR');
        psicologoR = document.getElementById('psicologoR');
        horarioR = document.getElementById('horarioR');
        pagoR = document.getElementById('pagoR');
        descripcionR = document.getElementById('descripcionR');
        nombreR.textContent = dataToSend.name;
        apellidoR.textContent = dataToSend.apellidos;
        emailR.textContent = dataToSend.email;
        celularR.textContent = dataToSend.telefono;
        servicioR.textContent = dataToSend.servicio;
        psicologoR.textContent = selectedPsicologo.name + " " +
            selectedPsicologo.apellidos;
        horarioR.textContent = formatDateRange(dataToSend.fecha_hora_inicio,
            dataToSend.fecha_hora_fin);
        pagoR.textContent = dataToSend.pago_tipo;
        descripcionR.textContent = dataToSend.adicional_info;
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Enviar";
    } else {
        document.getElementById("nextBtn").innerHTML = "Siguiente Paso"
    }
    activelevel(n);
}

function nextPrev(n) {
    console.log("currentTab1:" + currentTab);
    error = false;
    var x = document.getElementsByClassName("step");
    x[currentTab].style.display = "none";
    if (currentTab + n > currentTab)
        switch (currentTab) {
            case 0:
                error = validateUserStep();
                if (!error) {
                    error = true;
                    console.log("entró");
                    checkUserMail();
                }

                console.log(currentTab);
                break;
            case 1:
                error = validateServicioSelection();
                if (!error) {
                    error = true;
                    fetchPsicologo();
                }
                break;
            case 2:
                error = validatePsicologoSelection();
                console.log(currentTab);
                break;
            case 3:
                error = validateHorarioSelection();
                if (error) {
                    let timerInterval;
                    Swal.fire({
                        title: "Debe Seleccionar un Horario!",
                        html: `<span style="color: #713d81;">Elija uno de los 
                        <b>horarios</b> disponibles.</span>`,
                        timer: 2000,
                        timerProgressBar: true,
                        confirmButtonText: "Está bien",
                        padding: "1em",
                        color: "#edb1b5",
                        confirmButtonColor: "#edb1b5",
                        confirmButtonText: `<i class="fa fa-thumbs-up">
                        </i> Está Bien!`,
                        confirmButtonAriaLabel: "Thumbs up, super!",
                        didOpen: () => {
                            // Swal.showLoading();
                            const timer = Swal.getPopup().querySelector("b");
                            timerInterval = setInterval(() => {
                                // timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 1000);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        },
                        showClass: {
                            popup: `
                              animate__animated
                              animate__fadeInUp
                              animate__faster
                            `
                        },
                        hideClass: {
                            popup: `
                              animate__animated
                              animate__fadeOutDown
                              animate__faster
                            `
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log("se cerró el mensaje de sweet alert");
                        }
                    });
                } else {
                    dataToSend = {
                        ...dataToSend,
                        fecha_hora_inicio: selectedHorarios.fecha_hora_inicio,
                        fecha_hora_fin: selectedHorarios.fecha_hora_fin,
                        turno: selectedHorarios.turno,
                        dia: selectedHorarios.dia,
                    }
                }
                console.log(currentTab);
                break;
            case 4:
                console.log(currentTab);
                const infoAdicional = document.getElementById('info_adicional').value;
                dataToSend = { ...dataToSend, adicional_info: infoAdicional }
                break;
            case 5:
                error = validatePagoSelection(tipoPago);
                if (!error) {

                    dataToSend = {
                        ...dataToSend,
                        psicologo_id: selectedPsicologo?.id,
                        servicio: buttonServicio.text,
                        pago_tipo: tipoPago,
                    };
                }
                console.log(currentTab);
                break;
            case 6:
                console.log(currentTab);
                break;
            default:
                console.log('mono');
                break;
        }
    if (currentTab + n >= x.length) {
        error = true;

        console.log(dataToSend);
        sendDataSesion();
    }
    if (!error)
        currentTab += n;
    tabShow(currentTab);
}

const handleSelectPsychologist = (e, psychologistId) => {
    e.preventDefault();
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
        row.classList.remove('selected');
        row.style.backgroundColor = '#FFFFFF';
        if (row.dataset.name == psychologistId) {
            row.classList.add('selected');
            row.style.backgroundColor = '#EDB1B5';
        }
    });
    selectedPsicologo = psicologos.find((item) => {
        return item.id == psychologistId;
    });
};
const updateListPsicologysts = () => {
    bodyPsicologos = document.getElementById('body_psicologos');
    const generatePsychologistRow = psychologist => `<tr data-name=${psychologist.id}>
            <td>${psychologist.name} ${psychologist.apellidos}</td>
            <td>${psychologist.available ? 'Sí' : 'No'}</td>
            <td>
            <button class="btn btn-primary btn-paso1 fw-bold btn-select-psicologo" onClick='handleSelectPsychologist(event,${psychologist.id})'>Seleccionar</button>
            </td></tr>`;
    const psychologistHTML = psicologos.map(generatePsychologistRow).join('');
    bodyPsicologos.innerHTML = psychologistHTML;
}

function showTabAfterAsync() {
    updateListPsicologysts();
    console.log("currentTab2:" + currentTab);
    var x = document.getElementsByClassName("step");
    x[currentTab].style.display = "none";
    currentTab += 1;
    console.log("currentTab3:" + currentTab)
    tabShow(currentTab);
}


function backPrev(n) {
    var x = document.getElementsByClassName("step");
    x[n].style.display = "block";
}

function activelevel(n) {
    let i, x = document.getElementsByClassName("steplevel");
    let levelnumber = document.getElementsByClassName("levelnumber");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    for (let j = 0; j < levelnumber.length; j++) {
        if (j <= n)
            levelnumber[j].style.width = "100%"
        else
            levelnumber[j].style.width = "0%"
    }
    x[n].className += " active";
}


function fetchPsicologo(servicio = '') {
    const formData = new FormData();
    formData.append('especialidad', buttonServicio.text);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formData.append('_token', csrfToken);
    // for (const entry of formData.entries()) {
    //     console.log(entry[0], entry[1]);
    // }
    fetch('/getpsicologos', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        body: formData
    })
        .then(response => {

            if (!response.ok) {
                return response.json().then(error => {
                    throw new Error(error
                        .message);
                });
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            psicologos.length = 0;
            data.psicologos.map((p) => {
                psicologos.push(p);
            })
            showTabAfterAsync();
        })
        .catch(error => {
            console.error('Error fetching psychologists:', error.message);
            showNotification('Error fetching psychologists');
        });
}

function fetchSchedule(psychologistId) {
    const formData = new FormData();
    formData.append('psychologistId', psychologistId);
    formData.append('image', document.getElementById('imageInput').files[0]);

    document.getElementById('scheduleLoader').style.display = 'block';

    const fetchPromise = fetch('/schedule', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        body: formData
    });

    const timeoutPromise = new Promise((_, reject) => {
        setTimeout(() => {
            reject(new Error('Request timed out'));
        }, 5000);
    });

    Promise.race([fetchPromise, timeoutPromise])
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('scheduleLoader').style.display = 'none';
            document.getElementById('scheduleCard').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching schedule:', error.message);
            document.getElementById('scheduleLoader').style.display = 'none';
            showNotification('Error fetching schedule');
        });
}

function showNotification(message) {
    const notification = document.getElementById('emailError');
    notification.textContent = message;
    setTimeout(() => {
        notification.textContent = '';
    }, 5000);
}

function sendDataSesion() {
    const redirectUrl = document.getElementById('stepfinal').dataset.route;
    const formData = new FormData();
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    Object.keys(dataToSend).forEach(key => {
        formData.append(key, dataToSend[key]);
    });
    formData.append('_token', csrfToken);
    // for (const entry of formData.entries()) {
    //     console.log(entry[0], entry[1]);
    // }
    fetch('/savedatasesion', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dataToSend),
    })
        .then(response => {

            if (!response.ok) {
                return response.json().then(error => {
                    throw new Error(error
                        .message);
                });
            }
            return response.json();
        })
        .then(data => {
            window.location.href = redirectUrl;
            console.log(data);
        })
        .catch(error => {
            console.error('Error saving Session:', error.message);
            showNotification('Error saving session');
        });
}

function checkUserMail() {
    const email = document.getElementById('email').value;
    const formData = new FormData();
    formData.append('email', email);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formData.append('_token', csrfToken);
    // for (const entry of formData.entries()) {
    //     console.log(entry[0], entry[1]);
    // }

    fetch('/checkemail', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        body: formData
    })
        .then(response => {

            if (!response.ok) {
                return response.json().then(error => {
                    throw new Error(error
                        .message);
                });
            }
            return response.json();
        })
        .then(data => {
            const nombre = document.getElementById('nombre').value;
            const telefono = document.getElementById('telefono').value;
            const apellidos = document.getElementById('apellidos').value;
            const password = document.getElementById('contrasena').value;
            // const contacto = document.getElementById('contacto').value;
            dataToSend = {
                ...dataToSend,
                name: nombre,
                telefono: telefono,
                password: password,
                apellidos: apellidos,
                email: email
            };
            showTabAfterAsync();
        })
        .catch(error => {
            console.error('Error fetching psychologists:', error.message);
            showNotification('Error fetching psychologists');
        });
}



function validateUserStep() {
    const nombre = document.getElementById('nombre').value;
    const apellidos = document.getElementById('apellidos').value;
    const email = document.getElementById('email').value;
    const telefono = document.getElementById('telefono').value;
    const password = document.getElementById('contrasena').value;
    const passwordConfirmation = document.getElementById('confirmarContrasena').value;

    let error = false;
    if (validateEmpty(nombre)) {
        document.getElementById('nombreError').textContent = 'Ingrese un nombre válido.';
        error = true;
    } else {
        document.getElementById('nombreError').textContent = '';
    }
    if (validateEmpty(apellidos)) {
        document.getElementById('apellidosError').textContent = 'Ingrese un apellido válido.';
        error = true;
    } else {
        document.getElementById('apellidosError').textContent = '';
    }

    if (!validateEmail(email)) {
        document.getElementById('emailError').textContent = 'Ingrese un correo electrónico válido.';
        error = true;
    } else {
        document.getElementById('emailError').textContent = '';
    }

    if (!validateNumberOfDigits(telefono, 7)) {
        document.getElementById('telefonoError').textContent = 'Ingrese un número telefónico válido.';
        error = true
    } else {
        document.getElementById('telefonoError').textContent = '';
    }
    if (validateEmpty(password)) {
        document.getElementById('passwordError').textContent = 'Ingrese un password válido.';
        error = true;
    } else {
        document.getElementById('passwordError').textContent = '';
    }
    if (password != passwordConfirmation) {
        document.getElementById('passwordConfirmationError').textContent = 'debe repetir el mismo password.';
        error = true;
    } else {
        document.getElementById('passwordConfirmationError').textContent = '';
    }

    return error;
}

function validateServicioSelection() {
    let error = false;
    let buttonName = 'btn-servicio';
    document.getElementById('servicioError').textContent = '';
    if (!validateButtonSelection(buttonName)) {
        document.getElementById('servicioError').textContent = 'Seleccione un servicio por favor.';
        error = true;
    }
    return error;
}

function validatePsicologoSelection() {
    let error = false;
    let buttonName = 'btn-servicio';
    document.getElementById('psicologoSeleccionError').textContent = '';
    if (selectedPsicologo.length <= 0) {
        document.getElementById('psicologoSeleccionError').textContent = 'Seleccione un psicologo por favor.';
        error = true;
    }
    return error;
}
function validateHorarioSelection() {
    let error = false;
    document.getElementById('horarioSeleccionError').textContent = '';
    if (selectedHorarios.length <= 0) {
        document.getElementById('horarioSeleccionError').textContent = 'Seleccione un Horario por favor.';
        error = true;
    }
    return error;
}

function validatePagoSelection(pagoSelection = '') {
    let error = false;
    error = validateEmpty(pagoSelection)
    if (error) {
        document.getElementById('pagoSeleccionError').textContent = 'Seleccione un Tipo de Pago por favor.';
    }
    return error;
}
function handleButtonServicioClick(button, buttonText = 'temporal') {
    buttonServicio.id = button.id;
    buttonServicio.text = buttonText;
}

function formatDateRange(startDateStr, endDateStr) {
    const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    const startDate = new Date(startDateStr);
    const endDate = new Date(endDateStr);

    const formattedStartDate = `${startDate.getDate()}-${months[startDate.getMonth()]}-${startDate.getFullYear()} de ${startDate.getHours()}:${('0' + startDate.getMinutes()).slice(-2)}`;
    const formattedEndDate = `${endDate.getHours()}:${('0' + endDate.getMinutes()).slice(-2)}`;

    return `${formattedStartDate} a ${formattedEndDate}`;
}


// Inicialización del calendario
// document.addEventListener('DOMContentLoaded', function() {
const displayCalendar = (psicologo_id) => {
    let previouslyClickedEvent = null;
    let calendarEl = document.getElementById('calendario');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es', // Establecer el idioma español
        initialView: 'timeGridWeek',
        slotMinTime: '08:00:00', // Start time (6:00 AM)
        slotMaxTime: '22:00:00', // End time (10:00 PM)
        headerToolbar: false,
        allDaySlot: false,
        headerToolbar: {
            left: '',
            center: 'prev,next today',
            right: ''
        },
        locales: 'es',
        events: function (fetchInfo, successCallback, failureCallback) {
            var apiUrl = '/psicologo/gethorario';
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const formData = new FormData();
            formData.append('psicologo_id', psicologo_id);
            fetch(apiUrl, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    let events = [];
                    console.log(data)

                    for (let i = 0; i < 2; i++) {
                        // if (data?.intervalos)
                        //     console.log(data.intervalos);
                        // console.log(data.periodos);
                        data.periodos?.map(ev => {

                            const eventsTemp = [];
                            if (ev.isDisponibleManiana)
                                events.push({
                                    // id: ev.id,
                                    turno: '1',
                                    dia: ev.dia,
                                    hora_inicio: ev.hora_inicio_maniana,
                                    hora_fin: ev.hora_fin_maniana,
                                    title: 'Disponible',
                                    description: 'Horario disponible',
                                    start: convertToFcFormat(ev.dia, ev.hora_inicio_maniana, i),
                                    end: convertToFcFormat(ev.dia, ev.hora_fin_maniana, i),
                                    color: 'orange',
                                })
                            if (ev.isDisponibleTarde)
                                events.push({
                                    // id: ev.id,
                                    turno: '2',
                                    dia: ev.dia,
                                    hora_inicio: ev.hora_inicio_tarde,
                                    hora_fin: ev.hora_fin_tarde,
                                    title: 'Disponible',
                                    description: 'Horario disponible',
                                    start: convertToFcFormat(ev.dia, ev.hora_inicio_tarde, i),
                                    end: convertToFcFormat(ev.dia, ev.hora_fin_tarde, i),
                                    color: 'purple',
                                })
                        })
                    }

                    $.ajax({
                        url: '/psicologo/disponibilidad',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { events: events,
                            psicologo_id_: psicologo_id
                            },
                        success: function(secondResponse) {
                            events = secondResponse;
                            console.log(2);
                            console.log(events);
                            successCallback(events);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la segunda consulta:', error);
                        }
                    });

                    //console.log("prueba: ");
                    //console.log(events);
                    //successCallback(events);
                })
                .catch(error => {
                    console.error('Error fetching events:', error);
                    failureCallback(error);
                });

        },
        // height:parent,
        contentHeight: 'auto', // Adjust height to fit content
        views: {
            timeGridWeek: {
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: false,
                    meridiem: 'short'
                }
            }
        },
        windowResize: function (view) {
            if (window.innerWidth < 768) {
                calendar.setOption('contentHeight', 'auto');
            } else {
                calendar.setOption('contentHeight', 'auto');
                //calendar.setOption('contentHeight', 650); // Set to a fixed height for larger screens
            }
        },
        eventClick: function (info) {

            // Display event details in the modal

            if (previouslyClickedEvent !== null) {
                previouslyClickedEvent.setProp('title', 'Disponible');
                if (previouslyClickedEvent.extendedProps.turno == '1') {
                    console.log('orange');
                    previouslyClickedEvent.setProp('backgroundColor', 'orange'); // Change to original color
                }
                else if (previouslyClickedEvent.extendedProps.turno == '2') {
                    console.log('purple');
                    previouslyClickedEvent.setProp('backgroundColor', 'purple'); // Change to original color
                }
            }


            info.event.setProp('backgroundColor', 'red');
            info.event.setProp('title', 'Seleccionado');
            // Store the clicked event
            previouslyClickedEvent = info.event;
            console.log(convetToDBFormat(info.event.start));
            console.log(convetToDBFormat(info.event.end));

            guardarHorario(info.event.extendedProps.turno, info.event.extendedProps.dia, convetToDBFormat(info.event.start), convetToDBFormat(info.event.end))
        },
    });
    calendar.render();

    // Force a redraw after rendering
    // setTimeout(function() {
    //     calendar.updateSize();
    // }, 0);
    // });
    // Helper function to get the next date for a specific day of the week
    function convertToFcFormat(dayOfWeek, customHour, week) {
        // const dayOfWeekMap = {
        //     "lunes": 0,
        //     "martes": 1,
        //     "miercoles": 2,
        //     "jueves": 3,
        //     "viernes": 4,
        //     "sabado": 5,
        //     "domingo": 6,
        //     // other days can be added here if needed
        // };
        // const [hour, minute, second] = customHour.split(':').map(Number);

        // const today = new Date();
        // const resultDate = new Date(today);
        // resultDate.setDate(today.getDate() + (today.getDay()-dayOfWeekMap[dayOfWeek] +1));
        // resultDate.setUTCHours(hour, minute, second, 0);
        // const isoString = resultDate.toISOString();

        // return isoString.slice(0, 19);

        const dayOfWeekMap = {
            "lunes": 1,
            "martes": 2,
            "miercoles": 3,
            "jueves": 4,
            "viernes": 5,
            "sabado": 6,
            "domingo": 7,
            // other days can be added here if needed
        };
        const [hour, minute, second] = customHour.split(':').map(Number);

        const today = new Date();
        const todayDayOfWeek = today.getDay() === 0 ? 7 : today.getDay(); // Adjust Sunday to be 7 instead of 0
        // console.log("todayDayOfWeek" + todayDayOfWeek);

        let daysUntilNext = ((dayOfWeekMap[dayOfWeek] + 7 - todayDayOfWeek) % 7 + (week * 7));
        // console.log("daysUntilNext: " + daysUntilNext);
        // if (daysUntilNext === 0 && (hour < today.getHours() || (hour === today.getHours() && minute <= today.getMinutes()))) {
        //     daysUntilNext += 7;
        // }
        // console.log("getDate: " + today.getDate());
        const resultDate = new Date(today);
        // console.log("resultDate: " + resultDate);
        resultDate.setUTCHours(hour, minute, second, 0);
        resultDate.setDate(today.getDate() + daysUntilNext);


        // console.log("resultDate2: " + resultDate);

        return resultDate.toISOString().slice(0, 19);


        // const nextTwoWeeksDates = [];
        // for (let i = 0; i < 2; i++) {
        //     nextTwoWeeksDates.push(getNextDate(dayOfWeekMap[dayOfWeek] + i * 7));
        // }

        // return nextTwoWeeksDates;


    }

    const convetToDBFormat = (fecha) => {
        const date = new Date(fecha);
        // Adjust timezone to GMT-4
        var offset = -4 * 60; // Offset in minutes (GMT-4)
        date.setMinutes(date.getMinutes() + offset);
        return date.toISOString().slice(0, 19).replace('T', ' ');
    }

}

FullCalendar.globalLocales.push(function () {
    'use strict';
    var es = {
        code: "es",
        week: {
            dow: 1,
            doy: 4
        },
        buttonText: {
            prev: "Ant",
            next: "Sig",
            today: "Hoy",
            month: "Mes",
            week: "Semana",
            day: "Día",
            list: "Agenda"
        },
        weekText: "Sm",
        allDayText: "Todo el día",
        moreLinkText: "más",
        noEventsText: "No hay eventos para mostrar"
    };
    return es;
}());

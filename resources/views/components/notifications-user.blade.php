<div id="notificationContainer" class="notification-container">
        <div class="notification">
            <div class="notification-header">
                <h5 class="mb-0 font-alt">Notificaciones</h5>
                <button id="markReadBtn" class="btn btn-link"><i class="fas fa-check"></i></button>
            </div>
            <hr class="my-2">
            <div class="notification-body" id="notificationBody">
                <!-- Contenedor adicional para cada notificación -->
                <!-- <div class="notification-item-container mb-2">
                    TODO PENDIENTE
                    <button class="notification-item rounded bg-light py-2 px-3 border-0">
                        Usted ha registrado una nueva sesión. 
                    </button>
                </div>
                <div class="notification-item-container mb-2">
                    <button class="notification-item rounded bg-light py-2 px-3 border-0">
                        Usted ha cancelado una sesión.
                    </button>
                </div> -->
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const markReadBtn = document.getElementById('markReadBtn');
            const notificationBody = document.getElementById('notificationBody');

            if (markReadBtn) {
                markReadBtn.addEventListener('click', function() {
                    // Lógica para hacer la solicitud AJAX
                    fetch('/notificaciones/mark-all-read', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Notificaciones marcadas como leídas');
                        notificationBody.innerHTML = '';
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        });
    </script>
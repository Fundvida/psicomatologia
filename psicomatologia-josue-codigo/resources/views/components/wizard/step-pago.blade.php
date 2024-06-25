<div id="step-pago" class="content step" role="tabpanel" aria-labelledby="pago-step-trigger">
    <h2 class="text-start mb-4 font-alt">Método de pago de la Consulta</h2>
    <!-- Descripción "Seleccione el servicio por el que está interesado/a." alineada a la izquierda -->
    <p class="text-start lead fw-normal text-muted mb-5 ttNorms">Por favor, elige el método de pago que prefiera para completar su transacción. Ofrecemos varias opciones seguras para tu conveniencia.</p>
    
    <div class="payment-options mb-4">
    
        <div class="option">
            <input type="radio" id="qr" name="payment" value="QR">
            <label for="qr" style="cursor:pointer">
                <i class="fas fa-qrcode"></i>
                <h3 class="font-alt">Pago QR</h3>
                <p>Podrás escanear el código QR con tu aplicación bancaria</p>
            </label>
        </div>
        <div class="option">
            <input type="radio" id="bank" name="payment" value="Transferencia Bancaria">
            <label for="bank" style="cursor:pointer">
                <i class="fas fa-university"></i>
                <h3 class="font-alt">Cuenta Bancaria</h3>
                <p>Transfiere desde tu cuenta a nuestra cuenta bancaria</p>
            </label>
        </div>
        <div class="option">
            <input type="radio" id="cash" name="payment" value="Efectivo">
            <label for="cash" style="cursor:pointer">
                <i class="fa-solid fa-money-bill-wave"></i>
                <h3 class="font-alt">Pago en Efectivo</h3>
                <p>Paga en cualquiera de nuestras oficinas físicas</p>
            </label>
        </div>
        <div class="option">
            <input type="radio" id="paypal" name="payment" value="Paypal" >
            <label for="paypal" style="cursor:pointer">
                <i class="fa-brands fa-paypal"></i>
                <h3 class="font-alt">PayPal</h3>
                <p>Paga de forma segura con tu cuenta PayPal</p>
            </label>
        </div>
    </div>
    <span class="error-form" id="pagoSeleccionError"></span>
</div>
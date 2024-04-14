<form action="" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear nuevo psicologo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="flex flex-col pb-5" action="{{ route('psicologo.store') }}" method="POST">
                    @csrf

                    <div class=" flex flex-row w-full justify-center pt-10">
                        <div class="flex flex-col max-w-lg">
                        <div class="mx-10 mb-4">
                            <input type="text" name="nombre" class="w-full p-2 border border-gray-300 rounded" placeholder="nombres"/>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="apellido" class="w-full p-2 border border-gray-300 rounded" placeholder="apellidos"/>
                        </div>
                        <div class="mx-10 mb-4">
                            <label for="fecha_na" class="block text-gray-700 text-sm font-bold mb-2">Fecha de nacimiento</label>
                            <input type="date" name="fecha_na" class="w-full p-2 border border-gray-300 rounded" placeholder="fecha de nacimiento"/>
                        </div>
                        <div class="mx-10 mb-4">
                        <label for="fecha_titulo" class="block text-gray-700 text-sm font-bold mb-2">Fecha funcion titulo provisión</label>
                            <input type="date" name="fecha_titulo" class="w-full p-2 border border-gray-300 rounded" placeholder="fecha funcion titulo provision" required/>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="universidad" class="w-full p-2 border border-gray-300 rounded"placeholder="universidad" required/>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="c_recidencia" class="w-full p-2 border border-gray-300 rounded" placeholder="ciudad de residencia" required/>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="d_residencia" class="w-full p-2 border border-gray-300 rounded" placeholder="departamento de residencia" required/>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="p_residencia" class="w-full p-2 border border-gray-300 rounded" placeholder="pais de residencia" required/>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="ci" class="w-full p-2 border border-gray-300 rounded" placeholder="carnet de identidad"/>
                        </div>
                        <!-- <div class="mx-10 mb-4">
                            <input type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="confirmar contraseña"/>
                        </div> -->
                        </div>
                        <div class="flex flex-col">
                        <div class="mx-10 mb-4">
                            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" placeholder="Correo Electrónico"/>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="password" class="w-full p-2 border border-gray-300 rounded" placeholder="contraseña"/>
                        </div>
                        <div class="mx-10 mb-4">
                            <label for="input_cv" class="block text-gray-700 text-sm font-bold mb-2">Adjuntar CV</label>
                            <input type="file" name="input_cv" class="w-full p-2 border border-gray-300 rounded" placeholder="Adjuntar CV"/>
                        </div>
                        <div class="mx-10 mb-4">
                            <label for="descripcion_cv" class="block text-gray-700 text-sm font-bold mb-2">Descripción CV</label>
                            <textarea id="descripcion_cv" name="descripcion_cv" class="w-full p-2 border border-gray-300 rounded" rows="4" maxlength="500" required>

                            </textarea>
                        </div>
                        </div>
                        <div class="flex flex-col">
                        <div class="flex flex-row mx-10 mb-4">
                            <div class="w-1/2 mr-4">
                                <label for="codigo_pais" class="block text-gray-700 text-sm font-bold mb-2">Código de país</label>
                                <select id="codigo_pais" class="w-full p-2 border border-gray-300 rounded">
                                    <option value="">Cod. pais</option>
                                    <option value="591">+591 (Bolivia)</option>
                                    <option value="1">+1 (Estados Unidos)</option>
                                    <option value="52">+52 (México)</option>
                                    <option value="34">+34 (España)</option>
                                </select>
                            </div>
                            <div class="w-3/4">
                                <label for="numero_telefono" class="block text-gray-700 text-sm font-bold mb-2">Número de teléfono</label>
                                <input type="tel" id="numero_telefono" name="numero_telefono" class="w-full p-2 border border-gray-300 rounded" />
                            </div>
                        </div>
                        <div class="mx-10 mb-4">
                            <label for="metodo_confirmacion" class="block text-gray-700 text-sm font-bold mb-2">Método de confirmación</label>
                            <div class="flex flex-row">
                            <div class="mr-4">
                                <input type="radio" id="correo" name="metodo_confirmacion" value="correo" class="w-4 h-4 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" checked />
                                <label for="correo" class="ml-2 text-gray-700 text-sm">Correo electrónico</label>
                            </div>
                            <div class="mr-4">
                                <input type="radio" id="whatsapp" name="metodo_confirmacion" value="whatsapp" class="w-4 h-4 border-gray-300 rounded focus:ring-2 focus:ring-blue-500"/>
                                <label for="whatsapp" class="ml-2 text-gray-700 text-sm">WhatsApp</label>
                            </div>
                            <div class="mr-4">
                                <input type="radio" id="telegram" name="metodo_confirmacion" value="telegram" class="w-4 h-4 border-gray-300 rounded focus:ring-2 focus:ring-blue-500"/>
                                <label for="telegram" class="ml-2 text-gray-700 text-sm">Telegram</label>
                            </div>
                            <div>
                                <input type="radio" id="sms" name="metodo_confirmacion" value="sms" class="w-4 h-4 border-gray-300 rounded focus:ring-2 focus:ring-blue-500"/>
                                <label for="sms" class="ml-2 text-gray-700 text-sm">SMS</label>
                            </div>
                            </div>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="preg_uno" class="w-full p-2 border border-gray-300 rounded" placeholder="Pregunta de seguridad 1"/>
                        </div>
                        <div class="mx-10 mb-4">
                            <input type="text" name="preg_dos" class="w-full p-2 border border-gray-300 rounded" placeholder="Pregunta de seguridad 2"/>
                        </div>
                        <div class="mx-10 mb-4">
                        <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                            <input type="file" id="foto" name="foto" accept="image/*" class="w-full p-2 border border-gray-300 rounded"/>
                        </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-center">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                </form>
                <!-- <div class="mx-10 mb-4">
                    <input type="text" name="nombre" class="w-full p-2 border border-gray-300 rounded" placeholder="nombres" autocomplete="off"/>
                </div>
                <div class="mx-10 mb-4">
                    <input type="text" name="apellido" class="w-full p-2 border border-gray-300 rounded" placeholder="apellidos" autocomplete="off"/>
                </div> -->
            </div>
        </div>
        </div>
    </div>
</form>
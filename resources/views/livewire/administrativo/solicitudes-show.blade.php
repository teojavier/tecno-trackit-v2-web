<div>
    <div>
        <div class="grid grid-cols-3 px-4">
            <div class="pr-3">
                <label class="font-bold " for="">Soporte Asigando:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text" value="{{ $soporte->name }}"
                id="name" readonly>
            </div>
            <div class="pr-3">
                <label class="font-bold " for="">Solicitante:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text" value="{{ $cliente->name }}"
                id="name" readonly>
            </div>
            <div class="pr-3">
                <label class="font-bold " for="">Categoría:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text" value="{{ $categoria->name }}"
                id="name" readonly>
            </div>
        </div>
        <div class="grid grid-cols-3 px-4 pt-5">
            <div class="pr-3 col-span-2">
                <label class="font-bold " for="">Descripción:</label>
                <textarea class="w-full" name="description" id="" cols="30" rows="5" readonly>{{ $solicitud->description }}</textarea>
            </div>
            <div class="pr-3">
                <label class="font-bold " for="">ESTADO:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text" value="{{ $solicitud->date_request }}"
                id="name" readonly>
            </div>
        </div>
        <div class="grid grid-cols-3 px-4 mt-2">
            <div class="pr-3">
                <label class="font-bold " for="">Fecha de Solicitud:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text" value="{{ $solicitud->date_request }}"
                id="name" readonly>
            </div>
            <div class="pr-3">
                <label class="font-bold " for="">Fecha de Aceptación:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text" value="{{ $solicitud->date_accept }}"
                id="name" readonly>
            </div>
            <div class="pr-3">
                <label class="font-bold " for="">Fecha de Finalización:</label>
                <input class="rounded-lg focus:outline-none w-full text-black" type="text" value="{{ $solicitud->date_finish }}"
                id="name" readonly>
            </div>
        </div>

        <div class="mt-1 ml-3">
            <button onclick="enviarFormulario()"
                class="rounded-lg px-3 py-2 bg-primary text-white font-bold dark:text-light transform transition hover:scale-105 duration-300 ease-in-out">
                Solicitar
            </button>
        </div>

    </div>

    <script>
        Livewire.on('event-destroy-user', function(user) {
            Swal.fire({
                title: 'Estas seguro de eliminar a:' + user.name + ' ?',
                text: "Si aceptas no abrá vuelta atras!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, estoy seguro'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Usuario Eliminado Correctamente.',
                        'success'
                    )
                    Livewire.emit('eventDestroyUserAccept', user.id);
                }
            })

        });
    </script>
</div>

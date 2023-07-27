<div class="">
    <div class="p-5">
        <div class="flex ml-5">
            <span
                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px">
                    <path
                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
                </svg>
            </span>
            <input type="text"
                class="w-3/6 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block text-sm border-blackp-2.5  dark:bg-gray-700 dark:border-gray-600
             dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar" wire:model="search">

            <a href="{{ route('messengers.solicitudes.solicitar') }}"
                class="px-3 py-2 ml-5 bg-primary text-white rounded-md ">Solicitar</a>
        </div>
    </div>

    @if ($solicitudes->count())
        <div class="overflow-x-auto p-5">
            <table class="table">
                <thead>
                    <tr class="border bg-primary text-primary text-white uppercase text-sm leading-normal">
                        <th class="bg-primary">ID</th>
                        <th class="bg-primary">Descripcion</th>
                        <th class="bg-primary">Solicitante</th>
                        <th class="bg-primary">Soporte</th>
                        <th class="bg-primary">Estado</th>
                        <th class="bg-primary">Estado Mora</th>
                        <th class="bg-primary">Opciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 dark:text-light ">
                    @foreach ($solicitudes as $solicitud)
                        <tr class="border border-gray-200 hover:bg-gray-100 hover:text-black">
                            <td class="">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $solicitud->id }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    <span>{{ $solicitud->description }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    <span>{{ $solicitud->client }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    <span>{{ $solicitud->support }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    @if ($solicitud->status == 'Solicitado')
                                        <span class="bg-green-500 rounded-lg px-2">{{ $solicitud->status }}</span>
                                    @endif

                                    @if ($solicitud->status == 'Atendiendo')
                                        <span class="bg-yellow-500 rounded-lg px-2">{{ $solicitud->status }}</span>
                                    @endif

                                    @if ($solicitud->status == 'Finalizado')
                                        <span class="bg-blue-500 rounded-lg px-2">{{ $solicitud->status }}</span>
                                    @endif
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    @if ($solicitud->arrear_statu == 'sin mora')
                                        <span class="bg-green-500 rounded-lg px-2">{{ $solicitud->arrear_statu }}</span>
                                    @endif

                                    @if ($solicitud->arrear_statu == 'moroso')
                                        <span class="bg-red-500 rounded-lg px-2">{{ $solicitud->arrear_statu }}</span>
                                    @endif

                                </div>
                            </td>

                            <td class="">
                                <div class="flex item-center justify-center">
                                    <a href="{{ route('messengers.solicitudes.solicitar.show', $solicitud->id) }}"
                                        class="focus:outline-none">
                                        <div class="w-4 mr-2 transform hover:text-primary hover:scale-110">
                                            <i class="far fa-eye"></i>
                                        </div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="px-6 py-4">
            <strong class="text-red-800 animate-pulse">No existe ningun registro
                coincidente</strong>
        </div>

    @endif
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

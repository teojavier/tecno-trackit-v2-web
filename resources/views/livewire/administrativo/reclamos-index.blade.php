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

            <a href="{{ route('messengers.reclamos.reclamar') }}"
                class="px-3 py-2 ml-5 bg-primary text-white rounded-md ">Registrar</a>
        </div>
    </div>

    @if ($reclamos->count())
        <div class="overflow-x-auto p-5">

            <table class="table">
                <thead>
                    <tr class="border bg-primary text-primary text-white uppercase text-sm leading-normal">
                        <th class="bg-primary">ID</th>
                        <th class="bg-primary">Descripcion</th>
                        <th class="bg-primary">Categoría</th>
                        <th class="bg-primary">Solicitante</th>
                        <th class="bg-primary">Soporte</th>
                        <th class="bg-primary">Fecha</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 dark:text-light ">
                    @foreach ($reclamos as $reclamo)
                        <tr class="border border-gray-200 hover:bg-gray-100 hover:text-black">
                            <td class="">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $reclamo->id }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    <span>{{ $reclamo->description }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    <span>{{ $reclamo->categorie }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    <span>{{ $reclamo->client }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    <span>{{ $reclamo->support }}</span>
                                </div>
                            </td>

                            <td class="">
                                <div class="flex items-center">
                                    <span>{{ $reclamo->created_at }}</span>
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
</div>

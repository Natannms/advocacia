<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuração de imagens') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="bg-red-500">
            @if (session('success'))
                <div class="alert alert-success bg-green-600 text-white w-full rounded p-4 mb-10">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger bg-red-600 text-white w-full rounded p-4 mb-10">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="w-full sm:px-6 lg:px-8  py-10 flex gap-4">
            <form class="w-6/12 p-4 rounde-xl shadow bg-white" action="{{ route('image.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-2xl mb-4">Configurações principais</h1>
                <x-jet-label for="image" value="{{ __('Imagem da primeira dobra, logo ou pagina quem somos') }}" />
                <div class="flex flex-col gap-4 inputs">
                    <x-jet-input id="image" class="block mt-1 w-96" type="file" name="image" :value="old('image')"
                        required autofocus />

                    <select name="local" id="local" class="text-black">
                        <option value="first_fold">Primeira dobra do site</option>
                        <option value="quem_somos">Quem somos</option>
                        <option value="logo">Logo da empresa</option>
                    </select>
                    <div class=" justify-end flex">
                        <x-jet-button class=" w-48 text-center flex justify-center">
                            {{ __('Salvar') }}
                        </x-jet-button>
                    </div>
                </div>
                <div class="view_image mt-10">
                    <h2>Imagens do site</h2>
                    <table>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Image</span>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Product
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['images'] as $image)
                                        <tr class="bg-white border-b  hover:bg-gray-50 ">
                                            <td class="w-32 p-4">
                                                <img src="{{ url('storage/my_backgrounds') }}/{{ $image->image }}"
                                                    alt="{{ $image->local }}">
                                            </td>
                                            <td class="px-6 py-4 font-semibold text-gray-900">
                                                @switch($image->local)
                                                    @case('logo')
                                                        Logo da empresa
                                                    @break

                                                    @case('first_fold')
                                                        Primeira dobra do site
                                                    @break

                                                    @case('quem_somos')
                                                        Página quem somos
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </table>
                </div>
            </form>
            <form class="w-6/12 p-4 rounde-xl shadow bg-white" action="/imagens/store" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-2xl mb-4">Foto do profissional</h1>
                <x-jet-label for="image" value="{{ __('Sua logo') }}" />
                <div class="flex flex-col gap-4 inputs">
                    <input type="hidden" name="local" value="logo">
                    <x-jet-input id="image" class="block mt-1 w-96" type="file" name="image" :value="old('image')"
                        required autofocus />
                    <select name="team_id" id="tema_id" class="text-black">
                        @foreach ($data['teams'] as $key => $value)
                            @if ($value->name !== 'admin')
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class=" justify-end flex">
                        <x-jet-button class=" w-48 text-center flex justify-center">
                            {{ __('Salvar') }}
                        </x-jet-button>
                    </div>
                </div>
                <div class="view_image mt-10">
                    <h2>Imagens de profissionais</h2>
                    <table>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Image</span>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Product
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['teams'] as $key => $value)
                                        @if ($value->name !== 'admin')
                                            <tr class="bg-white border-b  hover:bg-gray-50 ">
                                                <td class="w-32 p-4">
                                                    <img src="{{ url('storage/img/logo') }}/{{ $value->img_name }}"
                                                        alt="{{ $value->name }}">
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900">
                                                    {{ $value->name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{ route('image.delete', $image->id) }}"
                                                        class="font-medium text-red-600 hover:underline">Remove</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </table>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

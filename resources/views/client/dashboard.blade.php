<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="actions mt-10">
            <form method="POST" class="flex items-center" action="{{ route('documents.store') }}"
                enctype="multipart/form-data">
                @csrf

                @if($data['client'])
                    <input type="hidden" name="user_id" value=" {{ $data['user']->id }}">
                @else
                    <select name="user_id" id="user_id" class="rounded h-8">
                        @foreach ($data['allClients'] as $key => $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                @endif

                <div class="input-group flex flex-col">
                    {{-- <label for="name" class="text-sm">Nome do arquivo</label> --}}
                    <input type="text" name="name" id="name" class="rounded h-8"
                        placeholder="Nomeie o arquivo" value={{ old('name') }}>
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group flex flex-col ml-4">
                    {{-- <label for="file" class="text-sm">Arquivo</label> --}}
                    <input type="file" name="file" id="file" class="rounded h-8 w-96 text-sm"
                        value={{ old('file') }}>
                    @error('file')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group flex flex-col ml-4 text-sm ">
                    <button type="submit" class="bg-green-600 text-white rounded h-8 w-64 py-2 px-3">Enviar</button>
                </div>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8  ">
                        <h2 class="text-2xl text-green-600">Seja bem vindo(a)</h2>
                        <p class="text-sm text-green-500">{{ $data['user']->name }}</p>
                    </div>
                    <div class="py-5">
                        <p class=" text-sm text-gray-400">
                            Veja abaixo seus arquivos enviados
                        </p>
                    </div>
                    {{-- documents --}}
                    <div class="mt-8 text-green-600 w-full ">
                        @foreach ($data['documents'] as $key => $document)
                            @switch($document->extension)
                                @case('pdf')
                                    <div class="flex justify-between items-center mt-4 border-2 border-b-green-500 py-2 px-2">
                                        <div class="flex items">
                                            <span class="material-symbols-outlined text-red-600">
                                                picture_as_pdf
                                            </span>
                                            <a href="{{ route('documents.show', $document->id) }}"
                                                class="ml-4 text-sm">{{ $document->name }}</a>
                                        </div>
                                    </div>
                                @break

                                @case('pdf')
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="flex items">
                                            <span class="material-symbols-outlined">
                                                description
                                            </span>
                                            <a href="{{ route('documents.show', $document->id) }}"
                                                class="ml-4 text-sm">{{ $document->name }}</a>
                                        </div>
                                    </div>
                                @break

                                @case('xlsx')
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="flex items">
                                            <span class="material-symbols-outlined text-green-700">
                                                inventory
                                            </span>
                                            <a href="{{ route('documents.show', $document->id) }}"
                                                class="ml-4 text-sm">{{ $document->name }}</a>
                                        </div>
                                    </div>
                                @break

                                @case('txt')
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="flex items">
                                            <span class="material-symbols-outlined text-gray-700">
                                                description
                                            </span>
                                            <a href="{{ route('documents.show', $document->id) }}"
                                                class="ml-4 text-sm">{{ $document->name }}</a>
                                        </div>
                                    </div>
                                @break

                                @case('csv')
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="flex items">
                                            <span class="material-symbols-outlined text-green-400">
                                                view_list
                                            </span>
                                            <a href="{{ route('documents.show', $document->id) }}"
                                                class="ml-4 text-sm">{{ $document->name }}</a>
                                        </div>
                                    </div>
                                @break

                                @case('pprt')
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="flex items">
                                            <span class="material-symbols-outlined text-orange-400">
                                                description
                                            </span>
                                            <a href="{{ route('documents.show', $document->id) }}"
                                                class="ml-4 text-sm">{{ $document->name }}</a>
                                        </div>
                                    </div>
                                @break

                                @default
                            @endswitch
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- {{ $data['users']->links() }} --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Areas de atuação') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('occupationArea.store') }}" method="POST" enctype="multipart/form-data">

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

                @csrf
                <div>
                    <x-jet-label for="occ" value="{{ __('Titulo') }}" />
                    <x-jet-input id="name" class="block mt-1 w-96" type="text" name="name" :value="old('name')"
                        required autofocus />
                </div>
                <div class="mb-4 mt-4 flex flex-col">
                    <textarea name="description"  id="summernote" cols="100" rows="10">
                    </textarea>
                    <small class="text-2xl font-black text-indigo-700 mt-4">
                        Descreva cada um dos seguimentos separados por ponto e virgula
                    </small>
                        {{-- <script>
                        $('#summernote').summernote({
                          placeholder: 'Descreva cada um dos seguimentos separados por virgula.',
                          tabsize: 2,
                          height: 120,
                          toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                          ]
                        });
                      </script> --}}
                </div>
                <div class="flex justify-end">
                    <x-jet-button class="bg-green-500">
                        {{ __('Salvar') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
        <div class="areas mt-10 flex bg-gray-400 flex-wrap">
            @foreach ($data['areas'] as $area)
                {{-- cards --}}

                <div class="lg:w-1/3 md:w-1/2 p-4 w-full">
                    <div class="h-full bg-gray-100 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        {{-- <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                            {{ $area->name }}</h2> --}}
                        <h1
                            class="title-font
                        sm:text-2xl text-xl font-medium text-gray-900 mb-3">
                            {{ $area->name }}</h1>
                        <p class="leading-relaxed mb-3">
                            @foreach ($area->occupationAreaItems as $item)
                                {{ $item->description }},
                            @endforeach
                        </p>
                        <div class="flex justify-center">
                            {{-- <a href="{{ route('area.edit', $area->id) }}"
                                class="bg-blue-500 text-white font-black p-4 rounded">Editar</a>
                            <a href="{{ route('area.delete', $area->id) }}"
                                class="bg-red-700 text-white font-black p-4 rounded">Deletar</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
{{-- {{ $data['users']->links() }} --}}

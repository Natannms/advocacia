<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configurações do blog') }}
        </h2>

    </x-slot>
    <div class="">
        <form action="{{ route('post.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
            <input type="hidden" name="id" value="{{$post->id}}">
            <div class="flex p-4">
                <div class="w-96">
                    <div>
                        <x-jet-label for="occ" value="{{ __('Titulo') }}" />
                        <x-jet-input id="title" class="block mt-1 w-96" type="text" name="title"
                            value="{{$post->title}}" required autofocus/>
                    </div>
                    <div class="mb-4 mt-4">
                        <x-jet-label for="occ" value="{{ __('Upload de imagem: ') }}" />
                        <x-jet-input id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-indigo-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="image"
                         autofocus />
                    </div>
                    <div class="mb-4 mt-4">
                        <x-jet-label for="occ" value="{{ __('Defina uma descrição breve: ') }}" />
                        <x-jet-input id="short_description" class="block mt-1 w-96" type="text"
                            name="short_description"  value="{{$post->short_description}}" required autofocus />
                    </div>
                    <div class="mb-4 mt-4">
                        <x-jet-label for="occ" value="{{ __('Você pode adicionar um link do Instagram: ') }}" />
                        <x-jet-input id="instagram_link" class="block mt-1 w-96" type="text" name="instagram_link"
                        value="{{$post->instagram_link}}" autofocus />
                    </div>
                    <div class="mb-4 mt-4">
                        <x-jet-label for="occ" value="{{ __('Você pode adicionar um link do facebook: ') }}" />
                        <x-jet-input id="facebook_link" class="block mt-1 w-96" type="text" name="facebook_link"
                        value="{{$post->facebook_link}}" autofocus />
                    </div>
                </div>

                <div class="mb-4 mt-6 ml-2 mr-2 flex flex-col w-full">
                    <textarea name="body" id="summernote" cols="100" rows="100">
                        {{$post->body}}
                    </textarea>
                    <script>
                        $('#summernote').summernote({
                            placeholder: 'Descreva cada um dos seguimentos separados por virgula.',
                            tabsize: 2,
                            height: 300,
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
                    </script>
                </div>
            </div>
            <div class="flex justify-end">
                <x-jet-button class="bg-green-500">
                    {{ __('Salvar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>

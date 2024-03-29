<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuração de imagens do site') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">

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
                <x-jet-label for="image" value="{{ __('Imagem da primeira dobra') }}" />
                <div class="flex gap-4 inputs">
                    <x-jet-input id="image" class="block mt-1 w-96" type="file" name="image" :value="old('image')"
                        required autofocus />
                    <select name="local" id="local">
                        <option value="logo">Logo da empresa</option>
                        <option value="first_fold">Primeira dobra da pagina</option>
                        <option value="quem_somos">Página quem somos</option>
                    </select>
                    <x-jet-button class="ml-4">
                        {{ __('Salvar imagem') }}
                    </x-jet-button>
                </div>
                {{-- <div class="view_image mt-10">
                    <h2>Imagem atual</h2>

                    @foreach ($data['images'] as $image)
                        @if ($image->local == 'first_fold')
                            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero"
                                src="{{ url('storage/my_backgrounds') }}/{{ $image->image }}">
                            <a class="bg-red-700 text-white font-black p-4 rounded"
                                href="{{ route('image.delete', $image->id) }}">Deletar</a>
                        @endif
                    @endforeach
                </div> --}}
            </form>
{{--
            @foreach ($data['teams'] as $profile)
            @if ($profile->name !== 'admin')
                <option value="quem_somos">Primeira dobra da pagina</option>
            @endif
        @endforeach --}}
        </div>
    </div>
</x-app-layout>
{{-- {{ $data['users']->links() }} --}}

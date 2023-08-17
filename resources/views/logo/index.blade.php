<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuração de imagens') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('logo.store') }}" method="POST" enctype="multipart/form-data">

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
                <x-jet-label for="image" value="{{ __('Insira sua logo') }}" />
                <div class="flex inputs">
                    <x-jet-input id="image" class="block mt-1 w-96" type="file" name="image"
                        :value="old('image')" required autofocus />
                    <x-jet-button class="ml-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
                <div class="view_image mt-10">
                    @foreach ( $data['images'] as $image )
                    @if ($image->local == 'logo')
                    <h2>Imagem atual</h2>
                    <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero"
                        src="{{ url('storage/img/logo') }}/{{ $image->image}}">
                            <a class="bg-red-700 text-white font-black p-4 rounded" href="{{ route('image.delete', $image->id) }}">Deletar</a>
                        @endif
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
{{-- {{ $data['users']->links() }} --}}

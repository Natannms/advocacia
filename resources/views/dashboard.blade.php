<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl text-indigo-600">
                        Clientes
                    </div>

                    <div class="mt-6 text-gray-700 bg-gray-700 px-4 py-4">
                        <ul
                            class="w-full text-sm font-medium text-gray-90 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-dark">
                            @foreach ($data['users'] as $key => $user)
                                <li class="py-2 px-4 w-full border-b border-gray-200 dark:border-gray-600 flex justify-between">
                                    <span>{{ $user->name}}</span>
                                    <div class="actions flex">
                                        <a href="{{ route('documents.show', $user->id) }}"
                                            class="text-indigo-600 hover:text-purple-900 ml-4">Documents</a>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 ml-4">Editar</a>
                                        <form class="ml-4" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{ $data['users']->links() }}
@dd($data)

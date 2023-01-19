<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha_empresa</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .bg-gray-1000 {
            background: rgb(29, 29, 29);
        }
    </style>
</head>

<body class="bg-gray-1000">
    <header class="text-gray-400 body-font bg-gray-1000 w-screen border-b-2 border-yellow-500/30">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium  justify-center text-gray-900 mb-4 md:mb-0">
                <img class=" object-cover object-center rounded w-12" alt="hero"
                    src="{{ url('storage/img/logo') }}/qma_icon.png"">
                <span class="ml-3 text-xl text-white">QMA</span>
            </a>

        </div>
    </header>
    {{-- if success get succcess message --}}
    @if (session('success'))
        <section class="mx-auto flex flex-col sm:flex-nowrap flex-wrap items-center bg-gray-50">
            <div class="alert alert-success text-white bg-green-600 font-bold p-4 w-full rounded">
                {{ session('success') }}
            </div>
            {{-- button for route: send.document --}}
            <div class="flex justify-center w-96 mt-10">
                <a href="{{ route('client.login') }}"
                    class="text-white bg-green-600 border-0 py-2 px-8 focus:outline-none hover:bg-green-700 rounded text-lg">Enviar
                    Documentos</a>
            </div>
        </section>
    @else
        <form action="{{ route('client.store') }}" method="POST"
            class=" px-40 py-40 mx-auto flex flex-col sm:flex-nowrap flex-wrap items-center bg-gray-50">
            @csrf
            <div class="tittle py-20">
                <h1 class="text-3xl text-gary-900 font-bold">Cadastre-se</h1>
                {{-- if error get error message --}}
                @if (session('error'))
                    <div class="alert alert-danger  text-white bg-red-600 font-bold p-4 w-full rounded">
                        <ul>
                            <li>{{ session('error') }}</li>
                        </ul>
                @endif
            </div>

            <div class="flex flex-col w-full px-40">
                <div class="relative mb-4 w-12/12 mr-4">
                    <label for="name" class="leading-7 text-sm text-gray-700">Nome Completo</label>
                    <input required type="text" id="name" name="name"
                        class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        {{-- old value --}} value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group flex flex-row">
                    <div class="relative mb-4 mr-4">
                        <label for="name" class="leading-7 text-sm text-gray-700">Nacionalidade</label>
                        <input required type="text" id="nacionalidade" name="nacionalidade"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('nacionalidade') }}">
                        @error('nacionalidade')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative mb-4 mr-4">
                        <label for="name" class="leading-7 text-sm text-gray-700">Profissão</label>
                        <input required type="text" id="profissao" name="profissao"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('profissao') }}">
                        @error('profissao')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative mb-4 mr-4">
                        <label for="rg" class="leading-7 text-sm text-gray-700">RG</label>
                        <input required type="text" id="rg" name="rg"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('rg') }}">
                        @error('rg')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative mb-4 mr-4">
                        <label for="cpf" class="leading-7 text-sm text-gray-700">CPF</label>
                        <input required type="text" id="cpf" name="cpf"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('cpf') }}">
                        @error('cpf')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>

                <div class="input-group flex flex-row">
                    <div class="relative mb-4 w-2/12 mr-4">
                        <label for="name" class="leading-7 text-sm text-gray-700">Estado Civil</label>
                        <select name="estado_civil" id="estado_civil"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out ">
                            <option value="">Selecione</option>
                            @if (old('estado_civil') == 'solteiro')
                                <option value="solteiro" selected>Solteiro</option>
                            @endif
                            <option value="solteiro">Solteiro</option>
                            <option value="casado">Casado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="viuvo">Viúvo</option>
                        </select>
                        @error('estado_civil')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative mb-4 mr-4 w-2/12">
                        <label for="name" class="leading-7 text-sm text-gray-700">Data de nascimento</label>
                        <input required type="date" id="data_nascimento" name="data_nascimento"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('data_nascimento') }}">
                        @error('data_nascimento')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative mb-4 mr-4 w-2/12">
                        <label for="tel" class="leading-7 text-sm text-gray-700">Phone</label>
                        <input required type="text" id="phone" name="phone" placeholder="(XXX) X XXXX-XXXX"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="relative mb-4 w-4/12 mr-4">
                        <label for="email" class="leading-7 text-sm text-gray-700">Email</label>
                        <input required type="text" id="email" name="email"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="relative mb-4 w-12/12 mr-4">
                    <label for="cep" class="leading-7 text-sm text-gray-700">CEP </label>
                    <input required type="text" id="cep" name="cep"
                        class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        value="{{ old('cep') }}">
                    @error('cep')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="relative mb-4 w-12/12 mr-4">
                        <label for="logradouro" class="leading-7 text-sm text-gray-700">Logradouro </label>
                        <input required type="text" id="logradouro" name="logradouro"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('logradouro') }}">
                        @error('logradouro')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group flex flex-row">
                        <div class="relative mb-4 mr-4 w-1/12">
                            <label for="numero" class="leading-7 text-sm text-gray-700">Número</label>
                            <input required type="text" id="numero" name="numero"
                                class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                value="{{ old('numero') }}">
                            @error('numero')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="relative mb-4 mr-4 w-6/12">
                            <label for="complemento" class="leading-7 text-sm text-gray-700">Complemento</label>
                            <input required type="text" id="complemento" name="complemento"
                                class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                value="{{ old('complemento') }}">
                            @error('complemento')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group flex flex-row">
                        <div class="relative mb-4 w-4/12 mr-4">
                            <label for="bairro" class="leading-7 text-sm text-gray-700">Bairro </label>
                            <input required type="text" id="bairro" name="bairro"
                                class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                value="{{ old('bairro') }}">
                            @error('bairro')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="relative mb-4 mr-4">
                            <label for="cidade" class="leading-7 text-sm text-gray-700">Cidade</label>
                            <input required type="text" id="cidade" name="cidade"
                                class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                value="{{ old('cidade') }}">
                            @error('cidade')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="relative mb-4 mr-4">
                            <label for="uf" class="leading-7 text-sm text-gray-700">UF</label>
                            <input required type="text" id="uf" name="uf"
                                class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                value="{{ old('uf') }}">
                            @error('uf')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="relative mb-4 mr-4">
                        <label for="trabalha_como" class="leading-7 text-sm text-gray-700">Você trabalha como:</label>
                        <input required type="text" id="trabalha_como" name="trabalha_como"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('trabalha_como') }}">
                        @error('trabalha_como')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative mb-4 mr-4">
                        <label for="atua_na_esfera" class="leading-7 text-sm text-gray-700">Caso seja servidor
                            público,
                            atua na esfera: </label>
                        <input required type="text" id="atua_na_esfera" name="atua_na_esfera"
                            class="w-full bg-white rounded border border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            value="{{ old('atua_na_esfera') }}">
                        @error('atua_na_esfera')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-between mt-10">
                        <a href="/"
                            class="text-white w-96 bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Cancelar</a>
                        <button type="submit"
                            class="text-white w-96 bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">Enviar</button>
                    </div>
                </div>
        </form>
    @endif
    {{-- footer --}}
    {{-- <footer class="text-gray-400 bg-gray-1000 w-full">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
                <img class=" object-cover object-center rounded w-12" alt="hero"
                    src="{{ url('storage/img/logo') }}/qma_icon.png"">
                <span class="ml-3 text-xl text-white">QMA</span>
            </a>
            <p class="text-sm text-gray-400 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">©
                2020 QMA QUEIROZ, MURARO & ASSI Advocacia —
                <a href="https://twitter.com/knyttneve" class="text-gray-500 ml-1" target="_blank"
                    rel="noopener noreferrer">@QMA</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-400">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5"
                            ry="5">
                        </rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer> --}}

</body>

</html>

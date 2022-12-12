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
    <header class="text-gray-400 body-font fixed bg-gray-1000 w-screen border-b-2 border-yellow-500/30">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium  justify-center text-gray-900 mb-4 md:mb-0">
                <img class=" object-cover object-center rounded w-12" alt="hero"
                    src="{{ url('storage/img/logo') }}/qma_icon.png"">
                <span class="ml-3 text-xl text-white">QMA</span>
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900">First Link</a>
                <a class="mr-5 hover:text-gray-900">Second Link</a>
                <a class="mr-5 hover:text-gray-900">Third Link</a>
                <a class="mr-5 hover:text-gray-900">Fourth Link</a>

                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="mr-5 hover:text-gray-900">Area Administrativa</a>
                        @else
                            <a href="{{ route('login') }}" class="mr-5 hover:text-gray-900">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="mr-5 hover:text-gray-900">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
        </div>
    </header>

    <section class="text-gray-400 bg-gray-900 body-font py-10">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-col text-center w-full mb-20">
                <h2 class="text-xs text-green-400 tracking-widest font-medium title-font mb-1">QMA</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-white">
                    Nossa equipe
                </h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($teamList as $item)
                    <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-800 bg-opacity-60 p-8 flex-col">
                            <div class="flex flex-col items-center">
                                <img src="{{ url('storage/img/logo') }}/{{ $item['img_name'] }}" alt=""
                                    class="rounded-full w-48">
                            </div>
                            <div class="flex items-center mb-3">
                                <div
                                    class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-green-500 text-white flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="">
                                <h2 class="text-white text-lg title-font font-medium">{{ $item['name'] }}</h2><br>
                                <h3 class="text-white text-lg title-font font-medium">{{ $item['document'] }}</h3>
                            </div>
                            <div class="flex-grow">

                                <ul class="list-disc px-10 py-5">
                                    @foreach ($item['graduations'] as $graduation)
                                        <li>{{ $graduation['description'] }}</li>
                                    @endforeach
                                </ul>
                                {{-- <a class="mt-3 text-green-400 inline-flex items-center">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="text-gray-400 bg-gray-700 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/3 flex flex-col sm:flex-row sm:items-center items-start mx-auto">
                <h1 class="flex-grow sm:pr-16 text-2xl font-medium title-font text-white">Solicite uma reunião online
                    com nossos
                    advogados especialistas</h1>
                <button
                    class="flex-shrink-0 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg mt-10 sm:mt-0">Solicitar</button>
            </div>
        </div>
    </section>
    @dd($teamList)
    {{-- Send Message --}}
    <section class="text-gray-700 bg-gray-200 body-font relative py-20">
        <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-green-700 tracking-widest font-medium title-font mb-1">CONTATO</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Envie-nos sua mensagem
            </h1>
        </div>
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
            <div
                class="lg:w-2/3 md:w-1/2 bg-gray-900 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                <iframe width="100%" height="100%" title="map" class="absolute inset-0" frameborder="0"
                    marginheight="0" marginwidth="0" scrolling="no"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.8760023981117!2d-43.93463258453913!3d-19.92962944344575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699e8591b0c1f%3A0x76e667d35fd4ed2a!2sAv.%20Afonso%20Pena%2C%202000%20-%20Centro%2C%20Belo%20Horizonte%20-%20MG%2C%2030130-009!5e0!3m2!1spt-BR!2sbr!4v1667244743091!5m2!1spt-BR!2sbr"
                    style="filter: grayscale(1) contrast(1.2) opacity(0.16);"></iframe>
                <div class="bg-gray-900 relative flex flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6">
                        <h2 class="title-font font-semibold text-white tracking-widest text-xs">ADDRESS</h2>
                        <p class="mt-1">Photo booth tattooed prism, portland taiyaki hoodie neutra typewriter</p>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <h2 class="title-font font-semibold text-white tracking-widest text-xs">EMAIL</h2>
                        <a class="text-green-400 leading-relaxed">example@email.com</a>
                        <h2 class="title-font font-semibold text-white tracking-widest text-xs mt-4">PHONE</h2>
                        <p class="leading-relaxed">123-456-7890</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                <h2 class="text-gray-700 text-lg mb-1 font-medium title-font">Fale conosco</h2>
                {{-- <p class="leading-relaxed mb-5">Av. Afonso pena 2000, Belo Horizonte - MG</p> --}}
                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-700">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full bg-gray-800 rounded border border-gray-700 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full bg-gray-800 rounded border border-gray-700 focus:border-green-500 focus:ring-2 focus:ring-green-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="message" class="leading-7 text-sm text-gray-700">Message</label>
                    <textarea id="message" name="message"
                        class="w-full bg-gray-800 rounded border border-gray-700 focus:border-green-500 focus:ring-2 focus:ring-green-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
                <button
                    class="text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">Enviar</button>
            </div>
        </div>
    </section>



    {{-- <iframe src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

    {{-- footer --}}
    <footer class="text-gray-400 bg-gray-1000 body-font">
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
    </footer>
</body>

</html>

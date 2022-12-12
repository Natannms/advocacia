<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha_empresa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{url('storage/img/logo')}}/favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <style>

        .bg-gray-1000 {
            background: rgb(29, 29, 29);
        }
    </style>
</head>

<body class="bg-gray-1000">
    <header class="text-gray-400 body-font fixed bg-gray-1000 w-screen">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium  justify-center text-gray-900 mb-4 md:mb-0">
                <img class=" object-cover object-center rounded w-12" alt="hero"
                    src="{{ url('storage/img/logo') }}/qma_icon.png"">
                <span class="ml-3 text-xl text-white">QMA</span>
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center menu">
                <a href="#area-atuacao" class="mr-5 hover:text-yellow-400">Areas de atuação</a>
                <a href="#apresentacao-institucional" class="mr-5 hover:text-yellow-400">Apresentação Institucional</a>
                <a href="#contact" class="mr-5 hover:text-yellow-400">Contato</a>
                <a href="/about" class="mr-5 hover:text-yellow-400">Quem somos</a>
                <a href="#team" class="mr-5 hover:text-yellow-400">Equipe</a>

                {{-- @if (Route::has('login'))
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
                @endif --}}
            </nav>
        </div>
    </header>

    {{-- hero --}}
    <section class="text-gray-400 bg-[url('{{ url('storage/img/logo') }}/low-angle-view-of-skyscrapers3.jpg')] body-font py-40">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero"
                src="{{ url('storage/img/logo') }}/qma_logo.png"">
            <div class="text-center lg:w-2/3 w-full">
                {{-- <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Microdosing synth tattooed vexillologist</h1> --}}
                <p class="leading-relaxed mb-8 text-white text-2xl">A Queiroz, Muraro & Assi Advocacia tem o foco de encontrar
                    soluções jurídicas para pessoas físicas e jurídicas, especialmente no ramo do Direito Público.
                    .</p>
                {{-- <div class="flex justify-center">
              <button class="inline-flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">Button</button>
              <button class="ml-4 inline-flex text-gray-400 bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 hover:text-white rounded text-lg">Button</button>
            </div> --}}
            </div>
        </div>
    </section>

    {{-- Area de atuação --}}
    <section id="area-atuacao" class="text-gray-400 body-font bg-gray-1000 p-40">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h2 class="text-xs text-green-400 tracking-widest font-medium title-font mb-1">Veja mais</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Áreas de atuação
                </h1>

            </div>
            <div class="flex flex-wrap">
                @foreach ($result['occupationAreas'] as $key => $item)
                    <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
                        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2"> {{ $item->name }}</h2>
                        <p class="leading-relaxed text-base mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Dolor maxime voluptas perspiciatis tenetur repellendus illo iste veritatis aut, rem,
                            iusto fugit doloribus perferendis quidem vitae debitis, dicta quos! Earum, velit?</p>
                        <a href="/area-de-atuacao/{{ $item->id }}"
                            class="text-green-400 inline-flex items-center">Ver mais
                            <svg fill="none" stroke="currentColor" stroke-linecap="Leia maisround"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('area_de_atuacao') }}"
                class="flex mx-auto w-96 items-center justify-center mt-16 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                Todas as áreas
            </a>
        </div>
    </section>


    {{-- paralax --}}
    <section
        class=" text-gray-400 body-font bg-gray-900 p-80 paralax bg-[url('{{ url('storage/img/logo') }}/bg4.jpg')] bg-cover bg-no-repeat bg-fixed">
        <div class="flex flex-col text-center w-full mb-20">
          <h2 class="text-white" style="font-size:45pt">EXCELÊNCIA COM FOCO NO RESULTADO AO CLIENTE </h2>
        </div>
    </section>

     {{-- Team --}}
     <section id="team" class="text-gray-400 body-font bg-white py-40">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h2 class="text-xs text-green-400 tracking-widest font-medium title-font mb-1">Veja mais</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-indigo-900">Equipe
                </h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-gray-900">
                Conheça nossa equipe de espcialistas </p>
            </div>
            <div class="flex flex-wrap ">
                @foreach ($result['team'] as $key => $item)
                    <div class="xl:w-4/12 lg:w-4/12 md:w-full px-8 py-6 border-l-2 border-gray-800 items-center justify-center flex flex-col">
                        <img src="{{ url('storage/img/logo') }}/{{ $item['img_name'] }}" alt=""
                        class="rounded-full w-48">
                        <h2 class="text-lg sm:text-xl text-indigo-900 font-medium title-font mb-2"> {{ $item->name }}</h2>
                        <p class="leading-relaxed text-indigo-900 font-medium mb-4">{{ $item->document }}</p>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('team.index') }}"
                class="flex mx-auto w-96 items-center justify-center mt-16 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
               Ver mais
            </a>
        </div>
    </section>

    {{-- Apresentação insitutcional --}}
    <section id="apresentacao-institucional" class="text-gray-400 bg-gray-1000 body-font py-40">
        <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-green-400 tracking-widest font-medium title-font mb-1">Veja mais</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Apresentação Institucional
            </h1>
        </div>
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                <img alt="feature" class="object-cover object-center h-full w-full"
                    src="{{ url('storage/img/logo') }}/bg1.png"">
            </div>
            <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                <div class="flex flex-col mb-10 lg:items-start items-center">
                    <div
                        class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-gray-800 text-green-400 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-white text-lg title-font font-medium mb-3">Quem somos</h2>
                        <p class="leading-relaxed text-base">
                            Nosso escritório surgiu a partir da unidade de
                            competências e valores dos nossos sócios que, juntos, pretendem oferecer serviços jurídicos
                            de
                            excelência com foco na apresentação de soluções jurídicas.
                        </p>
                        <a href="{{ route('about.index') }}" class="mt-3 text-green-400 inline-flex items-center">ver
                            mais
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- CTA --}}
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


    @php
        $whatsappNumber = '43988427402';
        $enderecos = ['Rua Paraná, 1909, Centro, Siqueira Campos/PR, CEP 84.940-000', 'Rua João Sbolli, 121, Centro, Quatiguá/PR, CEP 86.450-000', 'Rua Marechal Hermes, 43, Centro Cívico, Curitiba/PR CEP 80.530-230'];
        $email = 'contato@advocaciaqma.com';
        $instagram = 'https://www.instagram.com/advocaciaqma/';
    @endphp
    {{-- Contatos e redes sociais --}}
    <section id="contact" class="text-gray-700 bg-gray-200 body-font relative py-20">
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
                        @foreach ($enderecos as $item)
                            <p class="mt-1 text-gray-400 text-sm">{{ $item }}</p><br>
                        @endforeach
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <h2 class="title-font font-semibold text-white tracking-widest text-xs">EMAIL</h2>
                        <a class="text-green-400 leading-relaxed">{{ $email }}</a>
                        <h2 class="title-font font-semibold text-white tracking-widest text-xs mt-4">PHONE</h2>
                        <p class="leading-relaxed text-gray-400">(43) 9 8842-7402</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                <h2 class="text-gray-700 text-lg mb-1 font-medium title-font">Fale conosco</h2>

                <div class="socials flex flex-row mb-10 mt-10">
                    <a href="{{ $instagram }}"
                        class="text-pink-900  border-0 py-2 px-6 focus:outline-none hover:bg-pink-400 hover:text-white  rounded text-lg w-48 flex justify-center items-center">
                        <i class="mr-4 fa fa-instagram text-pink-900 "></i>
                        Instagram</a>
                    <a href="{{ $instagram }}"
                        class="text-blue-900  border-0 py-2 px-6 focus:outline-none hover:bg-blue-400 hover:text-white  rounded text-lg w-48 flex justify-center items-center">
                        <i class="mr-4 fa fa-facebook-official text-blue-900  "></i>
                        Facebook</a>
                </div>
                <a href="mailto:{{ $email }}"
                    class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-900 rounded text-lg w-96 flex justify-center items-center">
                    <i class="mr-4 fa fa-send text-white"></i>
                    Envie sua mensagem</a><br>
                <a href="https://api.whatsapp.com/send?phone={{ $whatsappNumber }}&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20servi%C3%A7os%20da%20Advocacia%20QMA."
                    class="text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg w-96 flex justify-center items-center">
                    <i class="mr-4 fa fa-whatsapp text-white"></i>
                    Whatsapp</a>
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
    <script>
        // Identificar o clique no menu
        // Verificar o item que foi clicado e fazer referência com o alvo
        // Verificar a distância entre o alvo e o topo
        // Animar o scroll até o alvo

        const menuItems = document.querySelectorAll('.menu a[href^="#"]');

        function getScrollTopByHref(element) {
            const id = element.getAttribute('href');
            return document.querySelector(id).offsetTop;
        }

        function scrollToPosition(to) {
            // Caso queira o nativo apenas
            // window.scroll({
            // top: to,
            // behavior: "smooth",
            // })
            smoothScrollTo(0, to, 1500);
        }

        function scrollToIdOnClick(event) {
            event.preventDefault();
            const to = getScrollTopByHref(event.currentTarget) - 80;
            scrollToPosition(to);
        }

        menuItems.forEach(item => {
            item.addEventListener('click', scrollToIdOnClick);
        });

        // Caso deseje suporte a browsers antigos / que não suportam scroll smooth nativo
        /**
         * Smooth scroll animation
         * @param {int} endX: destination x coordinate
         * @param {int) endY: destination y coordinate
         * @param {int} duration: animation duration in ms
         */
        function smoothScrollTo(endX, endY, duration) {
            const startX = window.scrollX || window.pageXOffset;
            const startY = window.scrollY || window.pageYOffset;
            const distanceX = endX - startX;
            const distanceY = endY - startY;
            const startTime = new Date().getTime();

            duration = typeof duration !== 'undefined' ? duration : 400;

            // Easing function
            const easeInOutQuart = (time, from, distance, duration) => {
                if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
                return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
            };

            const timer = setInterval(() => {
                const time = new Date().getTime() - startTime;
                const newX = easeInOutQuart(time, startX, distanceX, duration);
                const newY = easeInOutQuart(time, startY, distanceY, duration);
                if (time >= duration) {
                    clearInterval(timer);
                }
                window.scroll(newX, newY);
            }, 1000 / 60); // 60 fps
        };
    </script>
</body>

</html>

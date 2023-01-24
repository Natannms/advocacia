<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configurações do blog') }}
        </h2>
        {{-- button new Post --}}

        <a href="{{ route('post.create') }}"
            class="inline-flex text-white rounded shadow-sm bg-green-600 w-48  justify-center items-center m-1 mt-6 p-2">
            Criar novo post
        </a>

    </x-slot>
    <div class="modal bg-gray-800/70 fixed w-screen h-screen text-white p-4">
        <div id="alerts">

        </div>
        <div class="header p-4 flex justify-between">
            <h1 class="mb-4">Comentários</h1>
            <button class="bg-red-500 text-white rounded shadow-sm p-2" onclick="closeModal()">Fechar</button>
        </div>
        <div class="container p-2 flex flex-wrap" id="comment-list">
            <div class="card w-96 bg-gray-100 text-gray-800 p-4 shadow-xl ml-1 rounded">
                <div class="card-body">
                    <h2 class="card-title" id="author-name">Comentario de</h2>
                    <p id="comment" class="text-gray-600 pt-1 pb-1 bg-blue-200">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                    </p>
                    <div class="flex card-actions justify-between items-center">
                        <div class="mail">
                            <strong>Email do autor :</strong>
                            <span>teste@gmail.com</span>
                        </div>
                        <button id="button" class="p-2 bg-green-600 text-white rounded">status</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="w-12/12 px-2 py-2 sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font overflow-hidden">
                <div class="px-5 py-24">
                    <div class="flex flex-row flex-wrap w-full">

                        @foreach ($data['posts'] as $post)
                            <div class="p-12 w-96 flex flex-col items-start bg-white m-1 rounded shadow-md">

                                <h2 class="sm:text-2xl text-1xl title-font font-medium text-gray-900 mt-4 mb-4">
                                    {{ $post->title }}
                                </h2>

                                <div class="leading-relaxed p-2">
                                    {{ $post->body }}
                                </div>
                                <div
                                    class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full ">
                                    <a href="{{ route('post.show', $post->id) }}"
                                        class="text-green-500 inline-flex items-center">Ver mais
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>

                                    <span onclick="searchComments({{ $post->id}})"
                                        class="text-gray-400 inline-flex items-center leading-none text-sm w-full cursor-pointer">
                                        <span class="mr-10"> 6 comentários</span>
                                        <svg class="w-4 h-4 mr-10 " stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="w-full p-4 flex">
                                    <a href="{{ route('post.edit', $post->id) }}"
                                        class="inline-flex text-white rounded shadow-sm bg-yellow-600 w-full  justify-center items-center m-1">
                                        Editar
                                    </a>
                                    {{-- create a form delete --}}
                                    <form action="{{ route('post.delete', $post->id) }}" method="POST" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="inline-flex text-white rounded shadow-sm bg-red-600 w-full  justify-center items-center m-1">
                                            Deletar
                                        </button>
                                </div>
                            </div>
                        @endforeach

                        {{ $data['posts']->links() }}
                    </div>
                </div>
            </section>
        </div>

    </div>
    <script>
        closeModal();
        function setSpinner(local) {
            local.innerHTML = `
    <div role="status" class="w-full flex justify-center items-center">
        <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-green-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
    `
        }

        const commentList = document.querySelector('#comment-list');

        function clearCommentList() {
            commentList.innerHTML = '';
        }

        function searchComments(id) {
            clearCommentList(id);
            setSpinner(commentList);
            openModal();
            getComments(id);
        }

        function getComments(id) {
            try {
                fetch(`http://localhost:8000/api/comments/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        // clearCommentList();
                            console.log(data);
                        data.forEach(element => {
                            card = document.createElement('div');
                            card.setAttribute('class','card w-96 bg-gray-100 text-gray-800 p-4 shadow-xl ml-1 rounded')

                            card_body = document.createElement('div');
                            card_body.setAttribute('class','card-body');

                            card_title_author_name = document.createElement('h3');
                            card_title_author_name.setAttribute('class','card-title font-black uppercase pb-2');
                            card_title_author_name.innerHTML = element.name;

                            card_body.appendChild(card_title_author_name);

                            comment =  document.createElement('p');
                            comment.setAttribute('class','comment text-gray-600 pt-1 pb-1');
                            comment.innerHTML = element.body;

                            card_body.appendChild(comment);
                            // status and email
                            footer = document.createElement('div');
                            footer.setAttribute('class','flex card-actions justify-between items-center pt-4')


                            // elementos da caixa do email


                            card_email = document.createElement('div');
                            card_email.setAttribute('class','card-email');

                            card_email_label = document.createElement('strong');
                            card_email_label.setAttribute('class','card-email-label');
                            card_email_label.innerHTML = 'Email: ';

                            email = document.createElement('span');
                            email.setAttribute('class','email');
                            email.innerHTML = element.email;

                            // // inserindo strong e span em sua caixa

                            card_email.appendChild(card_email_label);
                            card_email.appendChild(email);


                            // // criando botão com status
                            button_toggle_satus = document.createElement('button');

                            if(element.approved){
                                button_toggle_satus.setAttribute('class','button-toggle-status p-2 bg-green-600 text-white rounded');
                                button_toggle_satus.innerHTML = 'Aprovado';
                            }else{
                                button_toggle_satus.setAttribute('class','button-toggle-status p-2 bg-red-600 text-white rounded');
                                button_toggle_satus.innerHTML = 'Não Aprovado';
                            }

                            button_toggle_satus.setAttribute('onclick',`toggleAprrroved(${element.id}), ${id}`);

                            footer.appendChild(card_email);
                            footer.appendChild(button_toggle_satus);

                            // // inserindo no card
                            card_body.appendChild(footer);

                            card.appendChild(card_body);

                            console.log(card);

                            // limpando a lista

                            clearCommentList();
                            commentList.appendChild(card);

                        });
                    })
            } catch (error) {
                console.log(error);
            }
        }

        function openModal() {
            document.querySelector('.modal').classList.add('block');
            document.querySelector('.modal').classList.remove('hidden');
        }

        function closeModal() {
            document.querySelector('.modal').classList.add('hidden');
            document.querySelector('.modal').classList.remove('block');
        }

        function toggleAprrroved(comment_id, post_id) {
            try {
                fetch(`http://localhost:8000/api/comments/${comment_id}/toggle-approved`)
                    .then(response => response.json())
                    .then((data) => {
                        console.log(data);
                        if(data.error){
                            console.log(data.error)
                        }

                        if(data.success){
                            console.log(data.success);
                            let alert = document.createElement('div');
                            alert.setAttribute('class', 'p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400');
                            alert.setAttribute('role', 'alert');

                            let span = document.createElement('span');
                            span.setAttribute('class', 'font-medium');
                            span.innerHTML = data.success;

                            alert.appendChild(span);

                            document.getElementById('alerts').appendChild(alert);

                            setTimeout(() => {
                                alert.remove();
                                window.location.reload();
                            }, 3000);

                        }
                    })
            } catch (error) {
                console.log(error);
            }
        }
    </script>
</x-app-layout>

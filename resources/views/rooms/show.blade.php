<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($roomName) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center mb-3 text-gray-400">Your chat starts here</div>
                    <div id="chats" class="grid mb-8">
                        @foreach ($chats as $chat)
                        <div class="bg-gray-200 py-1 px-3 rounded-md mb-1 {{ $chat->user_id == auth()->id() ? 'justify-self-end' : 'justify-self-start' }}">
                            <div class="text-xs text-gray-400">{{ $chat->user->name }}</div>
                            <div>{{ $chat->body }}</div>
                            <div class="text-xs text-gray-400">{{ $chat->created_at }}</div>
                        </div>
                        @endforeach
                    </div>
                    <form id="chat-store">
                        @csrf
                        <div class="flex">
                            <input type="text" id="body" name="body" value="" class="rounded-lg w-full mr-2" autofocus>
                            <button type="submit">Enter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script type="module">
            (function(){
                var roomId = "{{ request()->room->id }}";
                var userId = "{{ auth()->id() }}";

                document.getElementById('chat-store').addEventListener('submit', function (event) {
                    event.preventDefault();
                    var token = document.getElementsByName('_token')[0].value;
                    var body = document.getElementById('body').value;

                    return fetch("{{ route('chats.store') }}", {
                        method: "POST", 
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-Token": token,
                        },
                        body: JSON.stringify({
                            body,
                            roomId,
                        }), 
                    }).then(function(response) {
                        return response.json();
                    }).then(function(data) {
                        // console.log(data);
                    });
                });

                window.Echo.join(`chat.${roomId}`).listen("NewChat", (e) => {
                    // <div class="text-xs text-gray-400">{{ $chat->user->name }}</div>
                    // <div>{{ $chat->body }}</div>
                    // <div class="text-xs text-gray-400">{{ $chat->created_at }}</div>
                    var nameNode = document.createElement('div');
                    nameNode.innerText = e.userName;
                    nameNode.className = 'text-xs text-gray-400';
                    var bodyNode = document.createElement('div');
                    bodyNode.innerText = e.body;
                    var createdAtNode = document.createElement('div');
                    createdAtNode.innerText = e.createdAt;
                    createdAtNode.className = 'text-xs text-gray-400';

                    var wrapperNode = document.createElement('div');
                    wrapperNode.className = 'bg-gray-200 py-1 px-3 rounded-md mb-1 ' +
                        (e.userId == userId 
                        ? 'justify-self-end'
                        : 'justify-self-start')
                    ;
                    wrapperNode.appendChild(nameNode);
                    wrapperNode.appendChild(bodyNode);
                    wrapperNode.appendChild(createdAtNode);
                    document.getElementById('chats').appendChild(wrapperNode);
                    document.getElementById('body').value = '';
                });
            })()
        </script>
    @endsection
</x-app-layout>
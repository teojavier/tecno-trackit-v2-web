<div class="w-full px-10 flex flex-col justify-between" wire:poll.500ms>
    <div class="flex flex-col mt-5 chat-content" id="messageContainer">
        @foreach ($messages as $message)
            <div class="flex justify-end mb-4">
                <div class="mr-2 py-3 px-4 bg-primary rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                    {{ $message->input }}
                </div>
                <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full"
                    alt="" />
            </div>
            <div class="flex justify-start mb-4">
                <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full"
                    alt="" />
                <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                    {{ $message->output }}
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex items-center py-5">
        <input wire:model="input" class="flex-grow bg-gray-300 py-5 px-3 rounded-l-xl" type="text"
            placeholder="type your message here..." />
    
        <button wire:click="requestOpenAI" class="bg-primary hover:bg-primary-dark text-white py-5 px-6 rounded-r-xl">
            Enviar
        </button>
    </div>
    <script>
        let container = document.getElementById('messageContainer');
        window.addEventListener('DOMContentLoaded', () => {
            scrollDown();
        });

        window.addEventListener('scrollDown', () => {
            Livewire.hook('message.processed', () => {
                if (container.scrollTop + container.clientHeight + 100 < container.scrollHeight) {
                    return;
                }
            })
            scrollDown();
        });

        function scrollDown() {
            container.scrollTop = container.scrollHeight;
        }
    </script>
</div>

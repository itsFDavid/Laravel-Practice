<div class="">
    <div class="mb-4">
        {{$polls->links()}}
    </div>

    @forelse ($polls as  $poll)
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <div class="mb-4">
                <h3 class="mb-4 text-xl">{{$poll->title}}</h3>
            </div>

            @foreach ($poll->options as $option)
                <div class="mb-2">
                    <button class="btn mr-5" wire:click="vote({{ $option->id }})">Vote</button>
                    {{ $option->name }}  ({{ $option->votes->count() }})
                    <div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-center text-gray-500 m-3">No polls available</div>
    @endforelse
</div>

<!-- Agregar el script para ocultar el mensaje después de 2 segundos -->
<script>
    @foreach ($polls as $poll)
        @if (session('vote_success_'.$poll->id))
            setTimeout(function() {
                const message = document.getElementById("message-{{$poll->id}}");
                if (message) {
                    message.style.display = 'none';
                }
            }, 2000); // Oculta el mensaje después de 2 segundos
        @endif
    @endforeach
</script>

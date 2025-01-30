<div>
    <form >
        <label>Poll Title</label>
        {{-- Se necesita añadir .live para que muestre lo que se escriba al momento --}}
        <input type="text" wire:model.live.debounce.250ms="title">

        <h2>Current Title: <span class="text-blue-500">{{ $title }}</span></h2>

        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>

        <div class="mt-4">
            @foreach($options as $index => $option)
                <div class="mb-4">
                    {{ $index}} - {{ $option }}
                </div>
            @endforeach
        </div>
    </form>
</div>

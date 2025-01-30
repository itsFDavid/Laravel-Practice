<div>
    <form wire:submit.prevent="createPoll">
        <label>Poll Title</label>
        {{-- Se necesita añadir .live para que muestre lo que se escriba al momento --}}
        <input type="text" wire:model.live.debounce.250ms="title">

        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>

        <div class="mt-4">
            @foreach($options as $index => $option)
                <div class="mb-4 bg-gray-100 p-4 rounded-md">
                    <label class="text-sm">Option {{$index + 1}}</label>

                    <div class="flex gap-2 items-center">
                        <input type="text" class="bg-white" wire:model="options.{{ $index }}">
                        <button class="btn bg-white" wire:click.prevent="removeOption({{$index}})">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn">Create Poll</button>
    </form>
</div>

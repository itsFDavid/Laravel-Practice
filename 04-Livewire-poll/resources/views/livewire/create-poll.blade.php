<div>
    <form>
        <label>Poll Title</label>
        {{-- Se necesita añadir .live para que muestre lo que se escriba al momento --}}
        <input type="text" wire:model.live.debounce.250ms="title">

        <h2>Current Title: <span class="text-blue-500">{{ $title }}</span></h2>
    </form>
</div>

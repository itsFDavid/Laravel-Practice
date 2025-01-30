<div class="">
    @forelse ($polls as  $poll)
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <div class="mb-4">
                <h3 class="mb-4 text-xl">{{$poll->title}}</h3>
            </div>

            @foreach ($poll->options as $option)
                <div class="mb-2">
                    <button class="btn">Vote</button>
                    {{ $option->name }}  ({{ $option->votes->count() }})
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-center text-gray-500 m-3">No polls available</div>
    @endforelse
</div>

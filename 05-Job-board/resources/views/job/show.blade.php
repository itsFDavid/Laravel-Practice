<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="[
            'Jobs' => route('jobs.index'),
            $job->title => '#'
        ]"
    />


    <x-job-card :$job>
        {{-- Para mostrar los parrafos con su salto de linea se usa esto --}}
        <p class="text-sm text-slate-500 mb-4">
            {!!  nl2br($job->description) !!}
        </p>
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="text-lg font-medium mb-4">
            More {{ $job->employer->company_name }} Jobs
        </h2>

        <div class="text-sm text-slate-500">
            @forelse ($job->employer->jobs as $otherJob )
                <div class="mb-4 flex justify-between">
                    <div class="">
                        <div class="text-slate-700">
                            <a href="{{route('jobs.show', $otherJob)}}">
                                {{ $otherJob->title }}
                            </a>
                        </div>
                        <div class="text-xs">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        ${{ number_format($otherJob->salary) }}
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </x-card>
</x-layout>

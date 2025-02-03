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
</x-layout>

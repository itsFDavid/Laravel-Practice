<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="[
        'Jobs' => route('jobs.index')
    ]"
    />

    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET" id="filtering-form">
            {{-- @csrf <- esto hay que usarlo solo cuando sea PUT, PATCH, POST o incluso DELETE--}}
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" form-id="filtering-form"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>

                    <div class="flex space-x-2">
                        <x-text-input type="number" name="min_salary" value="{{ request('min_salary') }}" placeholder="From" form-id="filtering-form"/>
                        <x-text-input type="number" name="max_salary" value="{{ request('max_salary') }}" placeholder="To" form-id="filtering-form"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                        <x-radio-group name="experience"
                        :options="array_combine(
                                    array_map('ucfirst' ,\App\Models\Job::$experience),
                                    \App\Models\Job::$experience
                                )"
                        />
                    </label>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category"/>
                </label>
                </div>
            </div>

            <button class="w-full rounded-md border py-1.5">Filter</button>
        </form>
    </x-card>

    @forelse ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    View Job
                </x-link-button>
            </div>
        </x-job-card>
    @empty
        <div class="text-center text-slate-400 mt-20 underline">
            No jobs found.
        </div>
    @endforelse
</x-layout>

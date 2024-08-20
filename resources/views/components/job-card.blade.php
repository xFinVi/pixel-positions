{{-- card --}}
@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{ $job->employer->name }}</div>
    <div class="py-8">
        <h3 class="text-xl font-bold">
            <a href="{{ route('jobs.show', $job) }}" class="text-blue-500 hover:text-blue-700">{{ $job->title }}</a>

        </h3>
        <p class="mt-4 text-sm">Salary : {{ $job->salary }}</p>
    </div>
    <div class="py-8">

        <p>Workplace: <span class="text-lg font-bold text-white">{{ $job->workplace }}
            </span></p>

    </div>
    <div class="flex items-center justify-between mt-auto">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="small" class="text-xs" />
            @endforeach
        </div>
        <x-employer-logo :employer="$job->employer" :width="42" />
    </div>
</x-panel>

@props(['job'])

<x-panel class="flex-col text-center">
    <div>
        <div class="self-start text-sm">{{ $job->employer->name}}</div>

        <div class="py-8">
            <h3 class="group-hover:text-blue-700 text-xl font-bold transition-colors duration-300">{{ $job->title }}</h3>
            <p class="text-sm mt-4">{{ $job->schedule}} - From {{ $job->salary }}</p>
        </div>

        <div class="flex justify-between items-center mt-auto">
            <div>
                @foreach ($job->tags as $tag )
                    <x-tag size="small" :$tag />
                @endforeach
            </div>
            
            <x-employer-logo employer={{$job->employer}} :width="42"/>
        </div>
    </div>
</x-panel>

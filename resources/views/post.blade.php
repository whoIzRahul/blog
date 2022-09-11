<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-goback-button />
        {{-- Passing the post collection to the existing component called post grid --}}
        <x-featured-post-card :post="$post"/>
    </main>
</x-layout>

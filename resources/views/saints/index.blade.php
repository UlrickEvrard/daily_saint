<x-app-layout>
@foreach ($saints as $saint)

    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y p-6 flex flex-row justify-between space-x-2">
        <div>
            <strong> {{$saint->gender == "Femme" ? "Sainte" : "Saint"}} {{$saint->name}} </strong>
            <p> Genre : {{$saint->gender}} </p>
            <p> Nationalité : {{$saint->nationality}} </p>
            <p> Fêté le: {{$saint->celebrate}} </p>
            <p> Fonction : {{$saint->function}} </p>
            <p> Né le : {{$saint->birth}} </p>
            <p> Mort le : {{$saint->death}} </p>
        </div>
        <div class="flex flex-col justify-center">

            <x-dropdown-link :href="route('Saint.edit', $saint)">
                <img src={{url("build/img/edit.png")}} width="40">
            </x-dropdown-link>
        </div>
    </div>
@endforeach
</x-app-layout>

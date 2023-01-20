<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un Saint') }}
        </h2>
    </x-slot>

    
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <img src={{url("build/img/pray.png")}} width="100"/>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">    
            <form method="POST" action="{{ route('Saint.store') }}">
            @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="nationality" :value="__('Nationalité')" />
                    <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="function" :value="__('Function')" />
                    <x-text-input id="function" class="block mt-1 w-full" type="text" name="function" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('function')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="gender" :value="__('Gender')" />
                        <select name ="gender" id="gender">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                            <option value="Ange">Ange</option>
                        </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="celebrate" :value="__('Celebrate date')" />
                        <input id="celebrate" class="block mt-1 w-full" name="celebrate" type="date">
                    <x-input-error :messages="$errors->get('celebrate')" class="mt-2" />
                </div>
                

                <div>
                    <x-input-label for="birth" :value="__('Birth date')" />
                        <input id="birth" class="block mt-1 w-full" name="birth" type="date">
                    <x-input-error :messages="$errors->get('birth')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="death" :value="__('Death date')" />
                        <input id="death" class="block mt-1 w-full" name="death" type="date">
                    <x-input-error :messages="$errors->get('death')" class="mt-2" />
                </div>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

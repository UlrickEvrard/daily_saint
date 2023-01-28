<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('Saint.update', $saint) }}">
            @csrf
            @method('put')
            <div class="form-group">

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $saint->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="nationality" :value="__('Nationalité')" />
                    <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" :value="old('nationality', $saint->nationality)" required autofocus />
                    <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="function" :value="__('Function')" />
                    <x-text-input id="function" class="block mt-1 w-full" type="text" name="function" :value="old('function', $saint->function)" required autofocus />
                    <x-input-error :messages="$errors->get('function')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="gender" :value="__('Gender')" />
                        <select name="gender" id="gender" >
                            <option value="">--------------</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                            <option value="Ange">Ange</option>
                        </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="celebrate" :value="__('Celebrate date')" />
                        <input id="celebrate" class="block mt-1 w-full" name="celebrate" type="date" value="{{$saint->celebrate}}">
                    <x-input-error :messages="$errors->get('celebrate')" class="mt-2" />
                </div>
                
                <div>
                    <x-input-label for="birth" :value="__('Birth date')" />
                        <input id="birth" class="block mt-1 w-full" name="birth" type="date" value="{{$saint->birth}}">
                    <x-input-error :messages="$errors->get('birth')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="death" :value="__('Death date')" />
                        <input id="death" class="block mt-1 w-full" name="death" type="date" value="{{$saint->death}}">
                    <x-input-error :messages="$errors->get('death')" class="mt-2" />
                </div>

            </div>
            <div class="form-group">
                <div>
                    <label for="content">Contenu</label>
                    <textarea class="form-control" id="content" name="content">{{old('content', $saint->article->content)}}</textarea>
                </div>
            </div>

                
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="ml-4">
                    {{ __('Register') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>


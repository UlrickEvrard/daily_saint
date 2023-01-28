<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un Saint') }}
        </h2>
    </x-slot>

    
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>

        </div>
        <div class="w-full flex flex-row justify-center">
            <form method="POST" action="{{ route('Saint.store') }}" class="w-full h-full flex flex-col space-around items-center">
            @csrf
                <div class="w-full flex flex-col items-center lg:flex-row justify-around">
                    <div class="form-group w-full lg:w-4/12 mt-6 px-6 py-4 bg-indigo-100 shadow-md overflow-hidden sm:rounded-lg">
                        <div>
                            <x-input-label for="name" :value="__('Nom')" />
                            <x-text-input oninput="setName()" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nationality" :value="__('Nationalité')" />
                            <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="function" :value="__('Fonction')" />
                            <x-text-input id="function" class="block mt-1 w-full" type="text" name="function" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('function')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label  for="gender" :value="__('Type / Sexe ')" />
                                <select onchange="setGender(value)" name ="gender" id="gender">
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                    <option value="Ange">Ange</option>
                                </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="celebrate" :value="__('Date de célébration (dans l\'année en cours)')" />
                                <input id="celebrate" class="block mt-1 w-full" name="celebrate" type="date">
                            <x-input-error :messages="$errors->get('celebrate')" class="mt-2" />
                        </div>
                        

                        <div>
                            <x-input-label for="birth" :value="__('Date de naissance, si inconnu laisser vide, si 3ème siècle mettre 01/01/200 par exemple')" />
                            <input id="birth" class="block mt-1 w-full" name="birth" type="date">
                            <x-input-error :messages="$errors->get('birth')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="death" :value="__('Date de mort (pareil)')" />
                            <input id="death" class="block mt-1 w-full" name="death" type="date">
                            <x-input-error :messages="$errors->get('death')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="resumeArticle" :value="__('Résumé de l\'article')"/>
                            <textarea oninput="setResume(value)" id="resumeArticle" class="block mt-1 w-full" type="text" name="resumeArticle" :value="old('resumeArticle')" autofocus></textarea>
                            <x-input-error :messages="$errors->get('resumeArticle')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="contentArticle" :value="__('Contenu de l\'article')"/>
                                <textarea oninput="setContent(value)" id="contentArticle" class="block mt-1 w-full h-52" type="text" name="contentArticle" :value="old('contentArticle')" autofocus></textarea>
                            <x-input-error :messages="$errors->get('contentArticle')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="test" :value="__('Contenu de l\'article')"/>
                                <x-trix-field class="bg-white" id="test" name="test" />
                            <x-input-error :messages="$errors->get('test')" class="mt-2" />
                        </div>
                    </div>
                    <div class="form-group flex flex-row justify-around w-full h-max max-w-4xl mt-6 px-6 py-4 bg-indigo-100 shadow-md overflow-hidden sm:rounded-lg">
                        
                        <div class="rounded flex flex-col w-3/12 bg-white mr-2 h-96">

                            <img class="rounded-t-lg" src="http://localhost/images/ivan.png">

                            <div class="bg-zinc-800 w-full h-full rounded-b-lg">

                                
                                <h2 class="ml-4 text-white text-lg">
                                    <span id="genderDisplayer">Saint</span>
                                    <span id="cardNameDisplayer">Ulrick</span>
                                </h2>
                                <div class="flex flex-col items-center">
                                    <p class="bg-zinc-800 text-white text-sm w-10/12" id="resumeArticleDisplay" ></p>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col w-3/12 bg-white mr-2 h-96 rounded-lg">

                            <div class="bg-zinc-800 w-full h-full rounded-lg">
                            <div class="flex flex-col items-center">
                                    <p class="bg-zinc-800 text-white text-sm w-10/12" id="contentDisplay" ></p>
                                </div>
                            </div>

                        </div>  

                    </div>
                </div>
                <button class="mt-8 w-2/12 bg-indigo-100 rounded-lg p-2">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    
    function setName(){

        let inputName = document.getElementById('name');
        let cardNameDisplayer = document.getElementById('cardNameDisplayer');
        
        if(inputName.value == ""){

            cardNameDisplayer.innerHTML = "Ulrick";
        }
        else{

            cardNameDisplayer.innerHTML = inputName.value;
        }
    }

    function setGender(selectGender){   

        let genderDisplay = document.getElementById("genderDisplayer");
        
        if(selectGender == "Femme"){

            genderDisplay.innerHTML = "Sainte";
        }
        else{

            genderDisplay.innerHTML = "Saint";
        }
    }

    function setResume(resumeArticle){

        let resumeArticleDisplay = document.getElementById("resumeArticleDisplay");

        resumeArticleDisplay.innerHTML = resumeArticle;
    }

    function setContent(content){

        let contentDisplay = document.getElementById("contentDisplay");
        contentDisplay.innerHTML = content;
    }
</script>

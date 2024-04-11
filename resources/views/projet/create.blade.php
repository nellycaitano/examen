<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex justify-center items-center py-20" >

    <form action=" {{route('projet.store')}} " method="POST" class="border border-black w-[700px] max-w-[1024px] h-auto p-2 bg-[#FFEEEE]"> 

            <div class="flex items-center justify-center">
                 <h1 class="font-bold ">SAISIE DES PROJETS</h1>
            </div>

    
         @csrf
         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Code projet</label>
            <input type="text" name="codeProjet" class="">
         </div>

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Nom du projet</label>
            <input type="text" name="nomProjet" class="">
         </div>

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Date de Lancement</label>
            <input type="date" name="dateLancement" class="">
         </div>

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Durée</label>
            <input type="text" name="duree" class="">
         </div>

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Localité</label>
            <select name="localite" class="">
                @foreach($localites as $localite)
                  <option value="{{$localite->codLocalite}}"> {{$localite->nomLocalite}} </option>
                @endforeach
            </select>
         </div>
            <div class="flex justify-between px-4 mt-6">
                <button type="submit" class="w-auto h-auto px-4 py-[9px] border border-black">Soummettre</button>
                <button class="w-auto h-auto px-4 py-[9px] border border-black">Annuler</button>
            </div>
    
        </form>

        {{-- @if (isset($projets))
          @include('projet.list') 
        @endif --}}
{{-- 
        <div class="container"> 
         @yield('content')
        </div> --}}
        

</body>
</html>
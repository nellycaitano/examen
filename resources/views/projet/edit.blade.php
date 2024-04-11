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

    <form action="/update/traitement" method="POST" class="border border-black w-[700px] max-w-[1024px] h-auto p-2 bg-[#FFEEEE]"> 

            <div class="flex items-center justify-center">
                 <h1 class="font-bold ">SAISIE DES PROJETS</h1>
            </div>

    
         @csrf

         <input type="text" class="form-control" id="id" name="id" value="{{ $projet->id }}" style="display: none">

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Code projet</label>
            <input type="text" name="codeProjet" class="" value=" {{$projet->codeProjet}} ">
         </div>

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Nom du projet</label>
            <input type="text" name="nomProjet" class="" value=" {{$projet->nomProjet}} ">
         </div>

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Date de Lancement</label>
            <input type="date" name="dateLancement" class="" value=" {{$projet->dateLancement}} ">
         </div>

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Durée</label>
            <input type="text" name="duree" class="" value=" {{$projet->duree}} ">
         </div>

         <div class="flex items-center justify-between mt-4">
            <label for="" class="">Localité</label>
            <select name="localite" class="">
                @foreach($localites as $localite)
                  <option value="{{$localite->codLocalite}}" {{$projet->localite_id == $localite->codLocalite}} ? 'selected' : '' "> {{$localite->nomLocalite}} </option>
                @endforeach
            </select>
         </div>
            <div class="flex justify-between px-4 mt-6">
                <button type="submit" class="w-auto h-auto px-4 py-[9px] border border-black">Modifier</button>
                <button class="w-auto h-auto px-4 py-[9px] border border-black"><a href="{{route('projet.list')}}">Annuler</a></button>
            </div>
    
        </form>

</body>
</html>
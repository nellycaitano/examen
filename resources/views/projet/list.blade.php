
@extends('projet.index')

@section('content')
        
<div class=" px-20">

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Liste des projets</h1>

    
        @if (session('status'))
            <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
                {{ session('status') }}
            </div>
        @endif

        {{-- @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div> 
      @endif --}}

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th>Code projet</th>
                    <th>Nom du projet</th>
                    <th>Date de lancement</th>
                    <th>Durée</th>
                    <th>Localité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projets as $projet)
                    <tr>
                        <td>{{ $projet->codeProjet }}</td>
                        <td>{{ $projet->nomProjet }}</td>
                        <td>{{ $projet->dateLancement }}</td>
                        <td>{{ $projet->duree }}</td>
                        <td>{{ $projet->localite->nomLocalite }}</td>
                        <td>
                            <a href="{{route('projet.edit',$projet->id)}}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                            <a href="{{route('projet.delete', $projet->id)}}" class="text-red-500 hover:text-red-700 ml-2">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center items-center w-[150px] h-[50px] p-2 bg-slate-400 mt-10 rounded-md">
        <button><a href=" {{route('projet.create')}} ">Ajouter un projet</a></button>
        </div>
    
    </div>
    {{$projets->links()}}

</div>
@endsection



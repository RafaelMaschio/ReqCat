@extends('layouts.app')
@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-10 mx-auto">
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Requisitos do projeto {{$project->title}}</h1>
            <div class="mb-10">
                <h1 class="text-xl font-medium title-font mb-2 text-gray-900">Descrição: {{$project->description}}</h1>
            </div>
            <div class="flex items-center justify-between mb-2">
                <a class="flex mr-auto text-white bg-gray-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-gray-600 rounded" href="{{route('pdf.generate', $project_position)}}">Gerar documento</a>
                <a class="flex ml-auto text-white bg-gray-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-gray-600 rounded" href="{{route('requirement.suggestion', $project_position)}}">Sugestões de Requisitos</a>
                <a class="flex ml-5 text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded" href="{{route('requirement.create', $project_position)}}">Novo Requisito</a>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Título</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Tipo de Requisito</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Descrição</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y">
                @foreach ($requirements as $requirement)
                <tr @if ($loop->even) class="bg-gray-100"@endif>
                    <td class="px-4 py-3">{{$loop->iteration}}</td>
                    <td class="px-4 py-3">{{$requirement->title}}</td>
                    <td class="px-4 py-3">{{$requirement->type->title}}</td>
                    <td class="px-4 py-3">{{$requirement->description}}</td>
                    <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                        <a class="mt-3 text-indigo-500 inline-flex items-center" href="{{ route('requirement.edit', ['project_position'=>$project_position, 'requirement_position'=>$loop->iteration]) }}">Editar</a>
                        <form action="{{ route('requirement.destroy', ['project_position'=>$project_position, 'requirement_position'=>$loop->iteration]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="mt-3 text-indigo-500 inline-flex items-center">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
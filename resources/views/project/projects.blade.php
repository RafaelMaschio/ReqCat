@extends('layouts.app')
@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Projetos</h1>
                <a class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded" href="{{route('project.create')}}">Novo Projeto</a>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Título</th>
                    <th class="px-4 py-3 w-50 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Descrição</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y">
                @foreach ($projects as $project)

                <tr @if ($loop->even) class="bg-gray-100"@endif>
                    <td class="px-4 py-3">{{$loop->iteration}}</td>
                    <td class="px-4 py-3">
                        <a class="mt-3 text-indigo-500" href="{{ route('project.show', $loop->iteration) }}">{{$project->title}}</a>
                    </td>
                    <td class="px-4 py-3">{{$project->description}}</td>
                    <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                        <a class="mt-3 text-indigo-500 inline-flex items-center" href="{{ route('project.edit', $loop->iteration) }}">Editar</a>
                        <form action="{{ route('project.destroy', $loop->iteration) }}" method="POST">
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
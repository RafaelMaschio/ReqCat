@extends('layouts.app')
@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Sugestões de requisitos</h1>
            </div>
            <div class="invisible">
                @foreach ($requirements as $requirement)
                    {{$titles[$loop->index]=$requirement->title;}}
                @endforeach
            </div>
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Título</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Tipo de Requisito</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Descrição</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">Selecionar</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y">
                    @foreach ($requirementSuggestions as $requirementSuggestion)
                        @if (!in_array($requirementSuggestion->title, $titles))
                            <tr @if ($loop->even) class="bg-gray-100"@endif>
                                <td class="px-4 py-3">{{++$count}}</td>
                                <td class="px-4 py-3">{{$requirementSuggestion->title}}</td>
                                <td class="px-4 py-3">{{$requirementSuggestion->type->title}}</td>
                                <td class="px-4 py-3">{{$requirementSuggestion->description}}</td>
                                <td class="px-4 py-3 text-sm text-right text-gray-900">
                                    <form method="POST" action="{{route('requirement.store', $project_position)}}">
                                        @csrf
                                        <input type="hidden" value="{{$requirementSuggestion->title}}" id="title" name="title">
                                        <input type="hidden" value="{{$requirementSuggestion->type->id}}" id="requirement_types_id" name="requirement_types_id">
                                        <input type="hidden" value="{{$requirementSuggestion->description}}" id="description" name="description">
                                        <input type="hidden" value="{{$project->id}}" id="project_id" name="project_id">
                                        <div class=" w-full">
                                            <button type="submit" class="text-white bg-indigo-500 border-0 py-1 px-2 focus:outline-none hover:bg-indigo-600 rounded">Adicionar</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</section>
@endsection
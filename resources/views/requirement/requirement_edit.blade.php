@extends('layouts.app')
@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/4 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Editar Requisito</h1>
            </div>

            <form action="{{route('requirement.update', ['project_position'=>$project_position, 'requirement_position'=>$requirement_position])}}" method="POST">
                @csrf
                @method('put')
                <div class="flex flex-wrap">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Título</label>
                            <input value="{{old('title',$requirement->title)}}" type="text" id="title" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        @error('title')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Tipo do requisito</label>
                            <select class="w-full h-10 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="requirement_types_id" name="requirement_types_id">
                                @foreach ($requirementTypes as $requirementtype)
                                    <option value="{{$requirementtype->id}}" @if($requirementtype->id == $requirement->requirement_types_id) selected @endif>{{$requirementtype->title}}</option>
                                @endforeach      
                            </select>   
                        </div>
                        @error('requirement_types_id')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                            <textarea
                                id="description" name="description"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{old('description',$requirement->description)}}</textarea>
                        </div>
                        @error('description')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>

                    <input type="hidden" value="{{$requirement->project->id}}" id="project_id" name="project_id">

                    <div class="p-2 w-full">
                        <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Editar</button>
                    </div

                </div>
            </form>
        </div>
    </div>
</section>
@endsection
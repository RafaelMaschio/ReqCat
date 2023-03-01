@extends('layouts.app')
@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/4 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Adicionar projeto</h1>
            </div>

            <form method="POST" action="{{route('project.store')}}">
                @csrf
                <div class="flex flex-wrap">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Título</label>
                            <input value="{{old('title')}}" type="text" id="title" name="title"
                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        @error('title')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Motivado por</label>
                            <input value="{{old('motivado_por')}}" type="text" id="motivado_por" name="motivado_por" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        @error('motivado_por')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                            <textarea
                                id="description" name="description"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{old('description')}}</textarea>
                        </div>
                        @error('description')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="p-2 w-full">
                        <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Adicionar</button>
                    </div

                </div>
            </form>
        </div>
    </div>
</section>
@endsection
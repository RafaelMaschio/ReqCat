@extends('layouts.app')
@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-black title-font text-lg font-medium">Projetos criados:</h1>
            <div class="flex flex-wrap -m-4">
                @foreach ($projects as $project)
                
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <div class="mt-4">
                        <h2 class="text-gray-900 title-font text-md font-medium">{{$project->title}}</h2>
                        <p class="mt-1">{{$project->description}}</p>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="C:\Users\rafam\Desktop\Laravel\pfc\resources\css\app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>{{$project->title}}</title>
</head>
    <body>
        <div class="mb-5">
            <h2 class="">Documento de Requisitos</h2>
        </div>
        <div class="mb-5">
            <h6>Nome do projeto: {{$project->title}}</h6>
            <h6>Autor: {{$author}}</h6>
            <h6>Descrição: {{$project->description}}</h6>
        </div>
        @foreach ($types as $type)   
            <h6>Requisitos {{$type->title}}</h6>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-small text-gray-900 text-sm bg-gray-100">#</th>
                    <th class="px-4 py-3 title-font tracking-wider font-small text-gray-900 text-sm bg-gray-100">Título</th>
                    <th class="px-4 py-3 title-font tracking-wider font-small text-gray-900 text-sm bg-gray-100">Tipo de Requisito</th>
                    <th class="px-4 py-3 title-font tracking-wider font-small text-gray-900 text-sm bg-gray-100">Descrição</th>
                </tr>
                </thead>
                <tbody class="divide-y">
                @foreach ($requirements as $requirement)
                    @if ($type->title == $requirement->type->title)
                        <tr>
                            <td class="px-4 py-3">{{++$count}}</td>
                            <td class="px-4 py-3">{{$requirement->title}}</td>
                            <td class="px-4 py-3">{{$requirement->type->title}}</td>
                            <td class="px-4 py-3">{{$requirement->description}}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            @if (!$loop->last)    
                <div class="invisible page-break">{{$count=0}}</div>
            @endif
        @endforeach
    </body>
</html>
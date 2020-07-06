@extends('layouts.app')

@section('content')
    <div class="container mt-5">
         <ul class="list-group">
             @foreach($artigos as $artigo)
             <li class="list-group-item d-flex justify-content-between">
                <div>
                    <a href="{{ $artigo->link }}">Link do artigo</a>
                    <p>{{ $artigo->titulo }}</p>        
                </div>
                <div>
                    <form action="/deletar/{{ $artigo->id}}" method="post">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                </div>
             </li>
             @endforeach
         </ul>
         @if(count($artigos) > 0)
         <div class="mt-3">   
             <form action="/deletar-todos" method="post">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger">Excluir todos <?= count($artigos) ?> artigos</button>
                </form>
         </div>
        @else
        <div class="mt-3">   
            <p>Nenhum artigo adicionado</p>
         </div>

        @endif
    </div>
@endsection

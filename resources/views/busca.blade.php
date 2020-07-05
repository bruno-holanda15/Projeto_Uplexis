@extends('layouts.app')

@section('content')
        <div class="container mt-5">
            <h2>Página de busca</h2>

            @if($message === true)
                <div class="alert alert-success">Sucesso</div>
            @elseif($message === false)
                <div class="alert alert-danger">Falha</div>
            @else

            @endif
            <form action="/executa-crawler" method="POST" class="mt-4">
            @csrf
                <div class="form-group">
                    <label for="busca-artigo">Digite o artigo</label>
                    <input type="text" class="form-control" name="busca-artigo" name="busca-artigo">
                </div>
                <button class="btn btn-dark"> Pesquisar </button>
            </form>  
        </div>
@endsection
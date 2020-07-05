@extends('layouts.app')

@section('content')
<div class="container mt-5">
            <h2>Página de busca</h2>
            <form action="/executa-crawler" method="POST" class="mt-4">
            @csrf
                <div class="form-group">
                    <label for="artigo">Digite o artigo</label>
                    <input type="text" class="form-control" name="artigo" name="artigo">
                </div>
                <button class="btn btn-dark"> Pesquisar </button>
            </form>  
        </div>
@endsection

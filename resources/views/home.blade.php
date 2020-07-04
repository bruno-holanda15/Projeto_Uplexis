@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Você está logado!') }}
                </div>                 
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <form action="">    
        <div class="form-group">
            <label for="titulo_artigo">Pesquisar artigo</label>
            <input type="text" class="form-control" name="titulo_artigo" id="titulo_artigo" placeholder="Artigos">
        </div>
    </form>
</div>
@endsection

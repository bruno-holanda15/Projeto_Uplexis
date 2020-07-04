<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca de artigo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1 p-2">Projeto Uplexis</span>
            
        </nav>
    </header>

    <main>
        <div class="container mt-5">
            <h2>Página de busca</h2>

            @if($message === true)
                <div class="alert alert-success">Sucesso</div>
            @elseif($message === false)
                <div class="alert alert-danger">Falha</div>
            @else
            
            @endif
            <form action="" method="POST" class="mt-4">
                <div class="form-group">
                    <label for="busca-artigo">Digite o artigo</label>
                    <input type="text" class="form-control" name="busca-artigo" name="busca-artigo">
                </div>
                <button class="btn btn-dark"> Pesquisar </button>
            </form>  
        </div>
    </main>    



</body>
</html>
# Projeto_Uplexis

Projeto desenvolvido para capturar Artigos do blog uplexis, salvar dados no Banco de Dados MySql, e listar os mesmos com opção de remoção.

## Instruções

Abra o terminal e navegue até a pasta desejada e clone o repositório executando 
```
git clone https://github.com/bruno-holanda15/Projeto_Uplexis
```
Entre na raiz do arquivo e copie o formato do arquivo .env.example para .env e configure as informações para conexão com seu banco de dados.

Após execute os comando no terminal na pasta do projeto

```
composer install
php artisan key:generate
```

Agora só rodar um servidor com comando, e acessar o projeto pelo endereço local configurado no .env.
```
php artisan serve
```

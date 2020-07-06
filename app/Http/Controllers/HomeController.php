<?php

namespace App\Http\Controllers;

use DOMDocument;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\DomCrawler\Crawler;
use App\Artigo;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('home',compact('mensagem'));
    }

    public function listar()
    {
        $user = Auth::user();
        $artigos = Artigo::where('id_usuario',$user->id)->get();
        return view('lista',compact('artigos'));
    }

    public function deletar(Request $request)
    {
        $artigo = Artigo::find($request->id);
        $artigo->delete();

        $request->session()->flash(
            "mensagem",
            "Artigo com id $request->id excluido"
        );
        return redirect("home");
    }

    public function deletarTodos(Request $request)
    {
        Artigo::truncate();
     
        $request->session()->flash(
            "mensagem",
            "Todos artigos deletados"
        );
        return redirect("home");
    }

    public function crawler(Request $request)
    {
        $nomeArtigo = $request->artigo;
        $client = new Client(['base_uri' => 'https://www.uplexis.com.br/blog/']);
        $response = $client->request(
            "GET",
            "",
            [
                "query" => [ "s" => $nomeArtigo],
                "verify" => false,
                "headers" => [
                    "Accept" => "text/html"                   
                ]
            ]
        );

        $body = $response->getBody();
        $crawler = new Crawler();
        $crawler->addHtmlContent($body);

        //Titulos
        $elementoTitulos = $crawler->filter('div.title');
        $titulos = [];
        foreach($elementoTitulos as $titulo){
            $titulos[] = $titulo->textContent;
        }

        if(count($titulos) <= 0){
            
            $request->session()->flash(
                'mensagem',
                'Não foi localizado artigo com esse titulo, tente outro!'
            );
            return redirect('/home');
        }

        //Links
        $elementoLinks = $crawler->selectLink('Continue Lendo');
        $links = [];
        foreach ($elementoLinks as $link ) {
            $linkNode = new Crawler($link);
            $links[] = $linkNode->attr('href');
        }
        $user = Auth::user();
        $arrayFinal = [];

        for ($i=0; $i < count($links); $i++) { 
            $arrayFinal[] = [
                'link' => $links[$i],
                'titulo' => $titulos[$i],
                'id_usuario' => $user->id
            ];
        }
        Artigo::insert($arrayFinal);

        $request->session()->flash(
            'mensagem',
            'Adicionado artigos'
        );

        return redirect('/home');

    }
}

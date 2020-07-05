<?php

namespace App\Http\Controllers;

use DOMDocument;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

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
    public function index()
    {
        return view('home');
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
        $elementoTitulos = $crawler->filter('div.title');
        $titulos = [];
        foreach($elementoTitulos as $titulo){
            $titulos[] = $titulo->textContent;
        }

        $elementoLinks = $crawler->selectLink('Continue Lendo');
        $links = [];
        foreach ($elementoLinks as $link ) {
            $link = $crawler->filterXPath('/a')->attr('href');
            $links[] = $link;
        }
        var_dump($links);
        
    }
}

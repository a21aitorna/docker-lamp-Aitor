<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Contracts\HttpClient\HttpClientInterface;
    use Symfony\Contracts\Cache\CacheInterface;
    use Symfony\Contracts\Cache\ItemInterface;

    class PokemonController extends AbstractController{

        #[Route('/homepage', name:'homepage')]
        public function paginaPrincipal(): Response
        {
            return $this->render('homepage.html.twig');
        }


        #[Route('/entrenadores', name:'entrenadores')]
        public function mostrarEntrenadores(HttpClientInterface $httpClient, CacheInterface $cache): Response
        {
            $response = $cache->get('entrenadores_data', function(ItemInterface $cacheItem) use($httpClient){
                $cacheItem->expiresAfter(10);
                $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/a21aitorna/docker-lamp-Aitor/master/www/ud08/symfony_projects/public/json/entrenadores.json');
                return $response->toArray();
            });
            
            $entrenadores=$response;
            return $this->render('entrenadores.html.twig', ['entrenadores'=>$entrenadores]);
        }

        #[Route('/pokemon', name:'pokeAviso')]
        public function mostrarPokemon(): Response
        {

            return $this->render('poke.html.twig',);
        }
        #[Route('/pokemon/{id}', name:'pokemon')]
        public function mostrarPokemonDatos(HttpClientInterface $httpClient, CacheInterface $cache,$id): Response
        {

            $response = $cache->get('pokemon_data', function(ItemInterface $cacheItem) use($httpClient){
                $cacheItem->expiresAfter(10);
                $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/a21aitorna/docker-lamp-Aitor/master/www/ud08/symfony_projects/public/json/pokemon.json');
                return $response->toArray();
            });

            $datosPokemon = $response;
            
            if ($id > count($datosPokemon)) {
                return $this->render('aviso.html.twig', ['mensaje' => 'No existen más Pokémon disponibles.']);
            } else {
                $pokemon = $datosPokemon[$id] ?? null;
                return $this->render('pokemon.html.twig', ['pokemon' => $pokemon]);
            }
        }
        
    }



?>
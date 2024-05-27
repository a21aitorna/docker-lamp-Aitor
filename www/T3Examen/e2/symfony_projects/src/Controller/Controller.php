<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Contracts\HttpClient\HttpClientInterface;
    use Symfony\Contracts\Cache\CacheInterface;
    use Symfony\Contracts\Cache\ItemInterface;

    class Controller extends AbstractController{
       
        #[Route('/pets', name:'pets')]
        public function showPets(HttpClientInterface $httpClient): Response
        {
            $response =$httpClient->request('GET','https://raw.githubusercontent.com/a21aitorna/docker-lamp-Aitor/master/www/T3Examen/pets.json');
            $mascotas = $response->toArray();

            return $this->render('mascotas.html.twig', ['mascotas'=>$mascotas]);
        }
        
        #[Route('petscache', name:'petscache')]
        public function showPetsCache(HttpClientInterface $httpClient, CacheInterface $cache): Response
        {
            $response = $cache->get('pets_data', function(ItemInterface $cacheItem) use ($httpClient){
                $cacheItem->expiresAfter(2);
                $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/a21aitorna/docker-lamp-Aitor/master/www/T3Examen/pets.json');
                return $response->toArray();
            });

            $datosMascota = $response;
            return $this->render('mascotasCache.html.twig', ['datosMascotas'=>$datosMascota]);
        }
    }
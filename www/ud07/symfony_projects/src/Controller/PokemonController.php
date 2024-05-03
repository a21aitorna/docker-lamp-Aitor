<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class PokemonController extends AbstractController{

        #[Route('/homepage', name:'homepage')]
        public function paginaPrincipal(): Response
        {
            return $this->render('homepage.html.twig');
        }


        #[Route('/entrenadores', name:'entrenadores')]
        public function mostrarEntrenadores(): Response
        {
            $entrenadores = [
                ['nombre'=>'Ash Ketchum', 'comentario'=>'¡Te elijo a ti, Pikachu!', 'imagen'=>'/images/entrenadores/Ash.png'],
                ['nombre'=>'Misty', 'comentario'=>'¡Te elijo a ti, Staryu!', 'imagen'=>'/images/entrenadores/Misty.png'],
                ['nombre'=>'Brock', 'comentario'=>'¡Te elijo a ti, Onix!', 'imagen'=>'/images/entrenadores/Brock.png']
            ];

            return $this->render('entrenadores.html.twig', ['entrenadores'=>$entrenadores]);
        }

        #[Route('/pokemon', name:'pokeAviso')]
        public function mostrarPokemon(): Response
        {

            return $this->render('poke.html.twig',);
        }
        #[Route('/pokemon/{id}', name:'pokemon')]
        public function mostrarPokemonDatos($id): Response
        {
            $datosPokemon = [
                1=>['nombre'=>'Pikachu', 'tipo'=>'Eléctrico', 'descripcion'=>'Cuando se enfada, este Pokémon descarga la energía que almacena en el interior de las bolsas de las mejillas.'],
                2=>['nombre'=>'Charmander', 'tipo'=>'Fuego', 'descripcion'=>'La llama de su cola indica su fuerza vital. Si está débil, la llama arderá más tenue.'],
                3=>['nombre'=>'Bulbasaur', 'tipo'=>'Planta', 'descripcion'=>'Tras nacer, crece alimentándose durante un tiempo de los nutrientes que contiene el bulbo de su lomo.'],
                4=>['nombre'=>'Squirtle', 'tipo'=>'Agua', 'descripcion'=>'Tras nacer, se le hincha el lomo y se le forma un caparazón. Escupe poderosa espuma por la boca.']
            ];
            if ($id > count($datosPokemon)) {
                return $this->render('aviso.html.twig', ['mensaje' => 'No existen más Pokémon disponibles.']);
            } else {
                $pokemon = $datosPokemon[$id] ?? null;
                $pokemon['imagen'] = '/images/pokemon/'.$id.'.png'; //El nombre de la imagen coincide con el del id
                return $this->render('pokemon.html.twig', ['pokemon' => $pokemon]);
            }
        }
        
    }



?>
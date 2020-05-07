<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Form\AdType;
use App\Repository\AdRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     */
    public function index( AdRepository $repo)
    {
        //$repo = $this->getDoctrine()->getRepository(Ad::class);

        $ads = $repo->findAll();

        return $this->render('ad/index.html.twig', [
            'ads' => $ads
        ]);
    }
    
        /**
         * Permet de créer une annonce
         *
         * @Route("/ads/new", name="ads_create")
         * 
         * @return Response
         * 
         */
        public function create(Request $request){
            $ad = new Ad();

            $form = $this->createForm(AdType::class, $ad);

            $form->handleRequest($request);

            dump($ad);

            return $this->render('ad/new.html.twig', [
                'form' => $form->createView()
            ]);
        }

    /**
     * Permet d'afficher le contenu d'une annonce
     *
     * @Route("/ads/{slug}", name="ads_show")
     * 
     * @return Response
     */
    public function show(Ad $ad){
        // je récupere l'annonce qui correspond au slug
        // avec le @param converter qui prend le parametre de la route
        // $ad = $repo->findOneBySlug($slug);

        return $this->render('ad/show.html.twig', [
            'ad' => $ad
        ]);
    }
}

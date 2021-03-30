<?php

namespace App\Controller;

use App\Repository\SignalizationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function index(SignalizationRepository $sigRepo): Response
    {
        $signalisations = $sigRepo->findAll();
        return $this->render('admin/index.html.twig', ['signalisations' => $signalisations]);
    }

    /**
     * @Route("/admin/{type}", name="app_type_signalisation")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function showByType(string $type, SignalizationRepository $sigRepo): Response
    {
        $signalisations = $sigRepo->findBy(['type' => $type]);
        return $this->render('admin/index.html.twig', ['signalisations' => $signalisations]);
    }
}

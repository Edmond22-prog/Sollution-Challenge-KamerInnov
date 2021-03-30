<?php

namespace App\Controller;

use App\Entity\Signalization;
use App\Form\SignalisationFormType;
use App\Repository\SignalizationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(SignalizationRepository $sigRepo): Response
    {
        $signalisations = $sigRepo->findAll();
        return $this->render('home/index.html.twig', ['signalisations' => $signalisations]);
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }

    /**
     * @Route("/junk-bin-signalization", name="app_junk_bin_signalization")
     */
    public function SignalJunkBinAbsence(Request $request, EntityManagerInterface $em): Response
    {
        $signalization = new Signalization();
        $form = $this->createForm(SignalisationFormType::class, $signalization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $signalization->setType($request->query->get('type'));
            $image = $form['image']->getData();
            $imageDir = $this->getParameter('images_dir');
            if ($image) {
                $filename = bin2hex(random_bytes(6)) . '.' . $image->guessExtension();
                try {
                    $image->move($imageDir, $filename);
                } catch (FileException $e) {
                    //unable to upload the photo give up
                }
            }
            $signalization->setImage($filename);
            $em->persist($signalization);
            $em->flush();

            return $this->redirectToRoute('app_home');

        }

        return $this->render('home/junk-bin.html.twig',['form' => $form->createView(),]);
    }
}

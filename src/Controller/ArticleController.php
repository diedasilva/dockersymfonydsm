<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Article;

class ArticleController extends AbstractController
{
    #[Route(name: 'app_index')]
    public function listArticles(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Article::class);
        $articles = $repository->findAll();

        return $this->render('index.html.twig', [
            'articles' => $articles,
        ]);
    }
}

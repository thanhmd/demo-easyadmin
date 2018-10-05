<?php

namespace App\Controller\Category;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends AbstractController
{
    /**
     * @Route("/api/getCategories", name="get_categories")
     */
    public function getCategories()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)->findAll();

        if (!$categories) {
            throw $this->createNotFoundException(
                'No category found '
            );
        }
        return new JsonResponse($categories, 200, ["Access-Control-Allow-Origin"=>"*"]);
    }
}

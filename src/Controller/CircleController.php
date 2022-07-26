<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CircleService;

class CircleController extends AbstractController
{
    /**
     * @Route("/circle", name="circle", methods={"GET"})
     */
    public function showCirclePage(): Response
    {
        return $this->render('circle/circle.html.twig');
    }

    /**
     * @Route("/circle/circle-diameter-calculator", name="circle-diameter-calculator")
     */
    public function getRadiusParameter(Request $request, CircleService $circleService): Response
    {
        $radius = (int) $request->get('radius');

        $circleDiameter = $circleService->circleDiameterCalculator($radius);

        return $this->render('result_page.html.twig', [
            'message' => CircleService::resultMessage($circleDiameter),
        ]);
    }
}
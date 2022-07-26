<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TriangleService;

class TriangleController extends AbstractController
{
    /**
     * @Route("/triangle", name="triangle", methods={"GET"})
     */
    public function showTrianglePage(): Response
    {
        return $this->render('triangle/triangle.html.twig');
    }

    /**
     * @Route("/triangle/base-height-area-calculator", name="base-height-area-calculator")
     */
    public function getBaseAndHeightParameters(Request $request, TriangleService $triangleService): Response
    {
        $base = (int) $request->get('base');
        $height = (int) $request->get('height');

        $triangleArea = $triangleService->baseAndHeightAreaCalculator($base, $height);

        return $this->render('result_page.html.twig', [
            'message' => TriangleService::resultMessage($triangleArea),
        ]);
    }

    /**
     * @Route("/triangle/heron-formula-area-calculator", name="heron-formula-area-calculator")
     */
    public function getSideLenghtsParameters(Request $request, TriangleService $triangleService): Response
    {
        $sideA = (int) $request->get('side_a');
        $sideB = (int) $request->get('side_b');
        $sideC = (int) $request->get('side_c');

        $triangleArea = round($triangleService->heronFormulaAreaCalculator($sideA, $sideB, $sideC));

        /* check if triangle side lenghts have correct dimensions
         * A triangle is valid if sum of its two sides is greater than the third side
         */
        if (is_nan($triangleArea) || $triangleArea < 1) {
            return $this->render('result_page.html.twig', [
                'message' => 'Sides of a triangle are not valid.',
            ]);
        }

        return $this->render('result_page.html.twig', [
            'message' => TriangleService::resultMessage($triangleArea),
        ]);
    }
}

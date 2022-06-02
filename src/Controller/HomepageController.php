<?php

declare(strict_types=1);

/**
 * @author    Daniil Molchanov <sadme28@gmail.com>
 * @copyright Copyright (c) 2022, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Form\Handler\JokeFormHandlerInterface;
use App\Form\Type\JokeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Homepage controller
 *
 * @Route("/", name="app_homepage", methods={"GET","POST"})
 */
class HomepageController extends AbstractController
{
    /**
     * @var \App\Form\Handler\JokeFormHandlerInterface
     */
    private $handler;

    /**
     * @param \App\Form\Handler\JokeFormHandlerInterface $handler
     */
    public function __construct(JokeFormHandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(Request $request): Response
    {
        $form = $this->createForm(JokeFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handler->handle($form);

            $this->addFlash('notice', 'Email sent and saved to file!');
        }

        return $this->render('homepage.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

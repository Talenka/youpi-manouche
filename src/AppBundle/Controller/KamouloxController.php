<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KamouloxController extends Controller
{
    /**
     * @Route(
     *   "/kamoulox/{_locale}/{type}.{_format}",
     *   name = "kamoulox",
     *   defaults = {
     *     "_locale" = "fr",
     *     "type" = "",
     *     "_format" = "html"
     *   },
     *   requirements = {
     *     "_locale" = "fr|en",
     *     "type" = "\w+",
     *     "_format" = "html|xml|json"
     *   }
     * )
     */
    public function indexAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            '_locale' => $_locale
        ]);
    }
}

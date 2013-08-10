<?php

namespace Symfony\Cmf\Bundle\TestingBundle\Tests\Resources\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestingController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('::index.html.twig');
    }
}

<?php

namespace Snide\Bundle\DocumentorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class HookController extends Controller
{
    /**
     * Hook action
     *
     * @return array
     *
     * @Template
     */
    public function indexAction()
    {
        return array();
    }
}


<?php

namespace Snide\Bundle\DocumentorBundle\Controller;

use Snide\Bundle\CalendarBundle\Manager\EventManagerInterface;
use Snide\Bundle\DocumentorBundle\Generator\DocGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class HookController
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class HookController extends Controller
{
    /**
     * @Template
     *
     * @return array
     */
    public function indexAction()
    {
        $generator = new DocGenerator('/var/www/documentor');
        $generator->generate('/var/www/itkg_lib/itkg/src');
        return array();
    }
}

<?php

namespace Snide\Bundle\DocumentorBundle\Generator;

/**
 * Interface DocGeneratorInterface
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
interface DocGeneratorInterface
{
    public function generate($path);
}
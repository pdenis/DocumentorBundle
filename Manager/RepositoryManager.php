<?php

namespace Snide\Bundle\DocumentorBundle\Manager;

use Snide\Bundle\DocumentorBundle\Generator\DocGeneratorInterface;
use Snide\Bundle\DocumentorBundle\Handler\RepositoryHandler;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class RepositoryHandler
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class RepositoryManager
{
    protected $buildDir;
    protected $repositoryHandler;
    protected $filesystem;
    protected $docGenerator;

    public function __construct(RepositoryHandler $handler, DocGeneratorInterface $docGenerator, Filesystem $filesystem, $buildDir)
    {
        $this->repositoryHandler = $handler;
        $this->buildDir = $buildDir;
        $this->filesystem = $filesystem;
        $this->docGenerator = $docGenerator;
    }

    public function generateDoc($slug)
    {
        $this->initRepository($slug);
        $this->docGenerator->generate($this->getRepositoryBuildDir($slug));
        $this->removeRepository($slug);
    }

    protected function initRepository($slug)
    {
        $buildDir = $this->getRepositoryBuildDir($slug);
        $this->filesystem->mkdir($buildDir);
        $this->repositoryHandler->cloneRepository($slug, $buildDir);
    }

    protected function removeRepository($slug)
    {
        $this->filesystem->remove($this->getRepositoryBuildDir($slug));
    }

    protected function getRepositoryBuildDir($slug)
    {
        return sprintf('%s/%s', $this->buildDir, strtr($slug, '/', '_'));
    }
}

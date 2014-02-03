<?php

namespace Snide\Bundle\DocumentorBundle\Generator;

use Sami\Sami;
use Sami\Project;
use Symfony\Component\Finder\Finder;
use Snide\Bundle\DocumentorBundle\Model\Repo;

class DocGenerator
{
    protected $buildDir;
    protected $path;
    protected $config = array();

    public function __construct($buildDir, array $config = array())
    {
        $this->buildDir = $buildDir;
        $this->config = $config;
    }

    public function generate($path)
    {
        $this->path = $path;
        $sami = $this->createConfig();
        $project = $sami['project'];
        $project->parse();
        $project->render();
    }

    public function createIterator()
    {
        $iterator = Finder::create()
            ->files()
            ->name('*.php')
            ->in($this->path);

        return $iterator;
    }

    public function createConfig()
    {
        return new Sami($this->createIterator(),
            array(
                //   'versions'             => $versions,
                'title'                => 'Symfony2 API',
                'build_dir'            => $this->buildDir,
                'cache_dir'            => $this->buildDir,
                'default_opened_level' => 2,
            ),
            $this->config
        );
    }
}
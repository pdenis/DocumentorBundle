<?php

namespace Snide\Bundle\DocumentorBundle\Generator;

use Sami\Sami;
use Sami\Project;
use Symfony\Component\Finder\Finder;
use Snide\Bundle\DocumentorBundle\Model\Repo;

class DocGenerator
{
    protected $buildDir;
    protected $repo;
    protected $config = array();

    public function __construct($buildDir, array $config = array())
    {
        $this->buildDir = $buildDir;
        $this->config = $config;
    }

    public function generate(Repo $repo)
    {
        $this->repo = $repo;
        $project = new Project($this->createConfig());
        $project->parse();
        $project->render();
    }

    public function createIterator()
    {
        $iterator = Finder::create()
            ->files()
            ->name('*.php');

        return $iterator;
    }

    public function createConfig()
    {
        return new Sami($this->createIterator(),
            array(
                'theme'                => 'symfony',
                //   'versions'             => $versions,
                'title'                => 'Symfony2 API',
                'build_dir'            => $this->buildDir,
                'default_opened_level' => 2,
            ),
            $this->config
        );
    }
}

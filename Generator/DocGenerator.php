<?php

namespace Snide\Bundle\DocumentorBundle\Generator;

use Sami\Sami;
use Sami\Project;
use Symfony\Component\Finder\Finder;
use Snide\Bundle\DocumentorBundle\Model\Repo;

class DocGenerator implements DocGeneratorInterface
{
    protected $destDir;
    protected $config = array();

    public function __construct($destDir)
    {
        $this->destDir = $destDir;
    }

    public function generate($path)
    {
        // @TODO : Manager config file apizer.yml
        $this->path = $path;
        $sami = $this->createConfig($path);
        $project = $sami['project'];
        $project->parse();
        $project->render();
    }

    protected function createIterator($path)
    {
        // @TODO : Manage config file apizer.yml
        $iterator = Finder::create()
            ->files()
            ->name('*.php')
            ->in($path);

        return $iterator;
    }

    protected function createConfig($path)
    {
        // @TODO : Manage config file apizer.yml
        return new Sami($this->createIterator($path),
            array(
                //   'versions'             => $versions,
                'title'                => 'Symfony2 API',
                'build_dir'            => $this->destDir,
                'cache_dir'            => $this->destDir,
                'default_opened_level' => 2,
            ),
            $this->config
        );
    }
}
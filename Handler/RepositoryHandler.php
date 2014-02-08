<?php

namespace Snide\Bundle\DocumentorBundle\Handler;

use Gitonomy\Git\Repository;

/**
 * Class RepositoryHandler
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class RepositoryHandler implements RepositoryHandlerInterface
{
    /**
     * Github URL
     *
     * @var string
     */
    protected $url = 'https://github.com';

    /**
     * Clone a repository
     *
     * @param string $slug repository slug
     * @param string $buildDir clone destination
     * @return Repository
     */
    public function cloneRepository($slug, $buildDir)
    {
        return \Gitonomy\Git\Admin::cloneTo($buildDir, sprintf('%s/%s.git', $this->url, $slug), false);
    }

    /**
     * Get all branches from a repository
     *
     * @param string $slug
     * @return array
     */
    public function getRepositoryBranches($slug)
    {
        $repository = new Repository(sprintf('%s/%s', $this->url, $slug));

        return $repository->getReferences()->getBranches();
    }
}

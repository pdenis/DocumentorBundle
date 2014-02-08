<?php

namespace Snide\Bundle\DocumentorBundle\Handler;

/**
 * Interface RepositoryHandlerInterface
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
interface RepositoryHandlerInterface
{
    /**
     * Clone a repository
     *
     * @param string $slug repository slug
     * @param string $buildDir clone destination
     * @return Repository
     */
    public function cloneRepository($slug, $buildDir);

    /**
     * Get all branches from a repository
     *
     * @param string $slug
     * @return array
     */
    public function getRepositoryBranches($slug);
}
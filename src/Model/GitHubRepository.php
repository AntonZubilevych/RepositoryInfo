<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 26.07.18
 * Time: 13:40
 */

namespace App\Model;

use Github\Client;

class GitHubRepository
{
    protected $user;
    protected $repo;
    protected $branch = [];


    /**
     * GitHubRepository constructor.
     * @param $user
     * @param $repo
     * @param array $branch
     */
    public function __construct($user, $repo, array $branch)
    {
        $this->user = $user;
        $this->repo = $repo;
        $this->branch = $branch;
    }

    public function getCommits()
    {
        $client = new Client();

        return $client->api('repo')->commits()->all(
            $this->getUser(),
            $this->getRepo(),
            $this->getBranch()
        );

    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getRepo()
    {
        return $this->repo;
    }

    /**
     * @param mixed $repo
     */
    public function setRepo($repo): void
    {
        $this->repo = $repo;
    }

    /**
     * @return array
     */
    public function getBranch(): array
    {
        return $this->branch;
    }

    /**
     * @param array $branch
     */
    public function setBranch(array $branch): void
    {
        $this->branch = $branch;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 26.07.18
 * Time: 13:40
 */

namespace App\Model;



class GitHubRepository
{
    protected $user;
    protected $repo;
    protected $branch = [];
    protected $client;


    /**
     * GitHubRepository constructor.
     * @param $user
     * @param $repo
     * @param array $branch
     */
    public function __construct($user, $repo, array $branch,$client)
    {
        $this->user = $user;
        $this->repo = $repo;
        $this->branch = $branch;
        $this->client = $client;
    }

    public function getCommits():array
    {
        return $this->client->api('repo')->commits()->all(
            $this->getUser(),
            $this->getRepo(),
            $this->getBranch()
        );
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
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
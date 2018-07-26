<?php

namespace App\Controller;

use Github\Client;
use App\Model\GitHubRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index()
    {
        $KeyValueStorageRepo = new GitHubRepository('AntonZubilevych','KeyValueStorage',['sha' => 'master'], new Client());
        $commits = $KeyValueStorageRepo->getCommits();

        return $this->render('index.html.twig',compact('commits'));
    }
}
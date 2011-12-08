<?php

namespace Teachi\MaterialBundle\Service;

use Doctrine\ORM\EntityManager,
    Doctrine\ORM\EntityRepository;

class ContentService
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var BookRepository
     */
    private $repository;

    public function __construct(EntityManager $em, EntityRepository $repository)
    {
        $this->em         = $em;
        $this->repository = $repository;
    }
    
    /**
     * @param int    $id
     * @param string $content 
     */
    public function update($id, $content)
    {
        $this->repository->find($id)->setContent($content);
        $this->em->flush();
    }
    
    /**
     * @param array $content 
     */
    public function organize(array $content)
    {
        foreach($content as $order => $id) {
            $this->repository->find($id)->setNumber($order + 1);
        }
        
        $this->em->flush();
    }
}
<?php

namespace Teachi\MaterialBundle\Service;

use Doctrine\ORM\EntityManager,
    Doctrine\ORM\EntityRepository,
    Teachi\MaterialBundle\Entity\Chapter;

class ChapterService
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var ChapterRepository
     */
    private $repository;

    public function __construct(EntityManager $em, EntityRepository $repository)
    {
        $this->em         = $em;
        $this->repository = $repository;
    }

    /**
     * @param  int    $number 
     * @param  string $link 
     * @return Book
     */
    public function getChapterWithContentsByNumberAndBookLink($number, $link)
    {
        return $this->repository->findChapterWithContentsByNumberAndBookLink(
            $number, $link
        );
    }
    
    /**
     * @param  Chapter $chapter 
     * @return Chapter|null
     */
    public function getNextChapter(Chapter $chapter)
    {
        return $this->repository->findNextChapter($chapter);
    }
    
    /**
     * @param  Chapter $chapter 
     * @return Chapter|null
     */
    public function getPreviousChapter(Chapter $chapter)
    {
        return $this->repository->findPreviousChapter($chapter);
    }
}
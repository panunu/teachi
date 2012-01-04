<?php

namespace Teachi\MaterialBundle\Repository;

use Doctrine\ORM\EntityRepository as Repository,
    Doctrine\ORM\Query\Expr\Join as Join,
    Doctrine\ORM\NoResultException,
    Teachi\MaterialBundle\Entity\Chapter;

class ChapterRepository extends Repository
{
    const CHAPTER_NEXT = 1,
          CHAPTER_PREV = -1;
    
    /**
     * @param  int     $number
     * @param  int     $book
     * @return Chapter
     */
    public function findChapterWithContentsByNumberAndBookLink($number, $book)
    {
        $qb = $this->getBaseQueryBuilder()
            ->join('chapter.book', 'book', Join::WITH, 'book.link = :link')
            ->where('chapter.number = :number')
            ->setParameter('number', $number)
            ->setParameter('link',   $book);
        
        return $qb->getQuery()->getSingleResult();
    }
    
    /**
     * @param  Chapter $chapter
     * @return Chapter
     */
    public function findNextChapter(Chapter $chapter)
    {
        return $this->findAdjacentChapter($chapter);
    }
    
    /**
     * @param  Chapter $chapter
     * @return Chapter
     */
    public function findPreviousChapter(Chapter $chapter)
    {
        return $this->findAdjacentChapter($chapter, self::CHAPTER_PREV);
    }
    
    /**
     * @param  Chapter $chapter
     * @param  int     $adjacent
     * @return Chapter
     */
    protected function findAdjacentChapter(Chapter $chapter, $adjacent = self::CHAPTER_NEXT)
    {
        $qb = $this->getBaseQueryBuilder()
            ->where('chapter.number = :number')
            ->andWhere('chapter.book = :book')
            ->setParameter('number', $chapter->getNumber() + $adjacent)
            ->setParameter('book', $chapter->getBook());
        
        try {
            return $qb->getQuery()->getSingleResult();
        } catch(NoResultException $e) {
            return null;
        }
    }
    
    /**
     * @return QueryBuilder
     */
    protected function getBaseQueryBuilder()
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('chapter')
            ->from('Teachi\MaterialBundle\Entity\Chapter', 'chapter');
    }
}
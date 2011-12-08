<?php

namespace Teachi\MaterialBundle\Repository;

use Doctrine\ORM\EntityRepository as Repository,
    Doctrine\ORM\Query\Expr\Join as Join;

class ChapterRepository extends Repository
{
    public function findChapterWithContentsByNumberAndBookLink($number, $book)
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('chapter')
            ->from('Teachi\MaterialBundle\Entity\Chapter', 'chapter')
            ->join('chapter.book', 'book', Join::WITH, 'book.link = :link')
            ->where('chapter.number = :number')
            ->setParameter('number', $number)
            ->setParameter('link',   $book);
        
        return $qb->getQuery()->getSingleResult();
    }
}
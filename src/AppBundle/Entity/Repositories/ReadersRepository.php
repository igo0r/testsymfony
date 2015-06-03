<?php

namespace AppBundle\Entity\Repositories;

use Doctrine\ORM\EntityRepository;

/**
 * ReadersRepository
 */
class ReadersRepository extends EntityRepository
{
    /**
     * Get relation readers -> list of books
     *
     */
    public function getBooksByReaders()
    {
        $em          = $this->getEntityManager();
        $readersData = $em->createQuery(
            "SELECT R.id, B.name
            FROM AppBundle:ReadersRelations RR
            JOIN AppBundle:Books B WITH (RR.book = B.id)
            JOIN AppBundle:Readers R WITH (RR.reader = R.id)"
        )
            ->getArrayResult();

        $readerBookRelation = [];
        foreach ($readersData as $readerData) {
            $readerBookRelation[$readerData['id']][] = $readerData['name'];
        }

        return $readerBookRelation;
    }
}

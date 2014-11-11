<?php
namespace Sifo\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PositionRepository extends EntityRepository
{
    public function getProcessesNativeQuery()
    {
        $qb = $this->createQueryBuilder('s')
            ->orderBy('s.name', 'ASC');

        return $qb;
    }

    public function getFilterSearch($criteria)
    {
        $qb = $this->createQueryBuilder('s')
            ->orderBy('s.name', 'ASC');

        foreach ($criteria as $field => $value) {
            if (!$this->getClassMetadata()->hasField($field) or ($value == NULL) or ($value == "")) {
                continue;
            }

            if($field == 'isActive') {
                if ($value == 'false') $value = false;
                else $value = true;
                $qb ->andWhere($qb->expr()->eq('s.'.$field, ':s_'.$field))
                    ->setparameter('s_'.$field, $value);
            }
            else {
                $qb ->andWhere($qb->expr()->like('s.'.$field, ':s_'.$field))
                    ->setparameter('s_'.$field, '%'.$value.'%');
            }
        }

        return $qb;
    }
}
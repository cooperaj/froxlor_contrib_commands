<?php namespace Froxlor\Entity;

use Doctrine\ORM\EntityRepository;

class SettingRepository extends EntityRepository
{
    public function findByFullyQualifiedName($fqn)
    {
        list($group, $name) = explode('.', $fqn);

        return $this->findOneBy(['group' => $group, 'name' => $name]);
    }
}

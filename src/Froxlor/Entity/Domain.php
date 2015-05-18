<?php namespace Froxlor\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @Entity
 * @Table(name="panel_domains")
 **/
class Domain
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $domain;

    public function getDomain() { return $this->domain; }
}

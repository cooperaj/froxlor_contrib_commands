<?php namespace Froxlor\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @Entity(repositoryClass="Froxlor\Entity\SettingRepository")
 * @Table(name="panel_settings")
 **/
class Setting
{

    /**
     * @Id
     * @Column(name="settingid", type="integer")
     * @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(name="settinggroup", type="string")
     * @var string
     */
    protected $group;

    /**
     * @Column(name="varname", type="string")
     * @var string
     */
    protected $name;

    /**
     * @Column(type="text")
     * @var string
     */
    protected $value;

    public function getValue() { return $this->value; }
}

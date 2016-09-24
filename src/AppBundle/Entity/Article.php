<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DataRecord
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = (int) $id;
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {

    }
}
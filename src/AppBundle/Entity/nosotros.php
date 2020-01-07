<?php

namespace AppBundle\Entity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * nosotros
 *
 * @ORM\Table(name="entitynosotros")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Entity\nosotrosRepository")
 */
class nosotros
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}


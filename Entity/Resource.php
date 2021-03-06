<?php

namespace Sidus\FileUploadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sidus\FileUploadBundle\Model\BaseResource;

/**
 * This class can be used as a base to create new resources entities with single-table inheritance
 *
 * @ORM\Table(name="sidus_resource")
 * @ORM\Entity(repositoryClass="Sidus\FileUploadBundle\Entity\ResourceRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 *
 * @author Vincent Chalnot <vincent@sidus.fr>
 */
abstract class Resource extends BaseResource
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Serialize automatically the entity when passed to json_encode
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        $json['id'] = $this->getId();

        return $json;
    }
}

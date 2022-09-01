<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="email", column=@ORM\Column(type="string", name="email", length=255, nullable=true)),
 *      @ORM\AttributeOverride(name="emailCanonical", column=@ORM\Column(type="string", name="email_canonical", length=255, nullable=true))
 * })
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, unique=false, nullable=true)
     */
    private $name;

    /**
     * @var int
     * @ORM\Column(name="age", type="integer", nullable=true, unique=false)
     */
    private $age;

    /**
     * @var int
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var string
     * @ORM\Column(name="adresse_postale", type="string", length=255, nullable=true, unique=false)
     */
    private $adresse_postale;

    /**
     * @var int
     * @ORM\Column(name="code_postale", type="integer", nullable=true, unique=false)
     */
    private $code_postale;

    /**
     * @var string
     * @ORM\Column(name="ville", type="string", length=255, nullable=true, unique=false)
     */
    private $ville;

    /**
     * @var string
     * @ORM\Column(name="photo", type="string", nullable=true, unique=false)
     * @Assert\NotBlank(message="Veuillez uploader un fichier jpg / png / gif / bitmap.")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/jpg", "image/png", "image/gif", "image/bitmap" })
     */
    private $photo;

    /**
      * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User")
      */
    private $enfant;

    /**
     * @var bool
     *
     * @ORM\Column(name="planningVisited", type="boolean", nullable=true, options={"default": false})
     */
    private $planningVisited = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="contratVisited", type="boolean", nullable=true, options={"default": false})
     */
    private $contratVisited = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="accueilVisited", type="boolean", nullable=true, options={"default": false})
     */
    private $accueilVisited = false;

    /**
     * @var int
     * @ORM\Column(name="points", type="integer", nullable=true, unique=false)
     */
    private $points;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse_postale
     *
     * @param string $adressePostale
     * @return User
     */
    public function setAdressePostale($adressePostale)
    {
        $this->adresse_postale = $adressePostale;
    
        return $this;
    }

    /**
     * Get adresse_postale
     *
     * @return string 
     */
    public function getAdressePostale()
    {
        return $this->adresse_postale;
    }

    /**
     * Set code_postale
     *
     * @param integer $codePostale
     * @return User
     */
    public function setCodePostale($codePostale)
    {
        $this->code_postale = $codePostale;
    
        return $this;
    }

    /**
     * Get code_postale
     *
     * @return integer 
     */
    public function getCodePostale()
    {
        return $this->code_postale;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->roles = array('ROLE_EDUCATEUR');
    }

    /**
     * Add enfant
     *
     * @param \UserBundle\Entity\User $enfant
     * @return User
     */
    public function addEnfant(\UserBundle\Entity\User $enfant)
    {
        $this->enfant[] = $enfant;
    
        return $this;
    }

    /**
     * Remove enfant
     *
     * @param \UserBundle\Entity\User $enfant
     */
    public function removeEnfant(\UserBundle\Entity\User $enfant)
    {
        $this->enfant->removeElement($enfant);
    }

    /**
     * Get enfant
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * Set planningVisited
     *
     * @param boolean $planningVisited
     * @return User
     */
    public function setPlanningVisited($planningVisited)
    {
        $this->planningVisited = $planningVisited;
    
        return $this;
    }

    /**
     * Get planningVisited
     *
     * @return boolean 
     */
    public function getPlanningVisited()
    {
        return $this->planningVisited;
    }

    /**
     * Set contratVisited
     *
     * @param boolean $contratVisited
     * @return User
     */
    public function setContratVisited($contratVisited)
    {
        $this->contratVisited = $contratVisited;
    
        return $this;
    }

    /**
     * Get contratVisited
     *
     * @return boolean 
     */
    public function getContratVisited()
    {
        return $this->contratVisited;
    }

    /**
     * Set accueilVisited
     *
     * @param boolean $accueilVisited
     * @return User
     */
    public function setAccueilVisited($accueilVisited)
    {
        $this->accueilVisited = $accueilVisited;
    
        return $this;
    }

    /**
     * Get accueilVisited
     *
     * @return boolean 
     */
    public function getAccueilVisited()
    {
        return $this->accueilVisited;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return User
     */
    public function setPoints($points)
    {
        $this->points = $points;
    
        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }
}

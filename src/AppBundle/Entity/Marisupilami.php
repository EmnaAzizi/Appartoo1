<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class Marisupilami extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * @ORM\ManyToMany(targetEntity="Marisupilami",  inversedBy="friends")
     * @ORM\JoinTable(name="Marisupilami_relations",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="amis_id", referencedColumnName="id")}
     * )
     */
    public $friends;



    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255)
     */


    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="nourriture", type="string", length=255)
     */
    private $nourriture;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=255)
     */
    private $age;



    /**
     * Set race
     *
     * @param string $race
     *
     * @return Marisupilami
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return Marisupilami
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set nourriture
     *
     * @param string $nourriture
     *
     * @return Marisupilami
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;

        return $this;
    }


    /**
     * Get nourriture
     *
     * @return string
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return Marisupilami
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }


    /**
     * @return ArrayCollection|Marisupilami[]
     */
    public function getFriends()
    {
        return $this->friends;
    }


    public function AjoutAmis(Marisupilami $user)
    {
        $this->friends->add($user);
    }

    public function SuppAmis(Marisupilami $user)
    {
        return $this->friends->removeElement($user);
    }


    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->race = ""; //<-- add this
        $this->famille = ""; //<-- add this
        $this->nourriture = ""; //<-- add this
        $this->age = ""; //<-- add this
        $this->friends = new ArrayCollection();
    }

}


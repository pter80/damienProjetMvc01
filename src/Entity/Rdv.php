<?php
namespace Entity;
// src/Rdv.php
use Doctrine\ORM\Mapping as ORM;
use \DateTime;
use Entity\Contact;
/**
 * Rdv
 *
 * @ORM\Table(name="rdv")
 * @ORM\Entity
 */




class Rdv
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Contact")
     */
    protected $contact;
    
    /**
     * @ORM\Column(name="date_debut", type="datetime", nullable=true, unique=false)
     */
    protected $dateDebut;

    /**
     * @ORM\Column(name="date_fin", type="datetime", nullable=true, unique=false)
     */
    protected $dateFin;
    
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contact.
     *
     * @param \Entity\Contact|null $contact
     *
     * @return Rdv
     */
    public function setContact(\Entity\Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return \Entity\Contact|null
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set dateDebut.
     *
     * @param \DateTime|null $dateDebut
     *
     * @return Rdv
     */
    public function setDateDebut($dateDebut = null)
    {
        $this->dateDebut = DateTime::createFromFormat("j/m/Y H:i",$dateDebut);
        //$this->dateDebut=$this->dateDebut->format('Y-m-d H:i:s');
        //var_dump($dateDebut,$this->dateDebut);die;
        

        return $this;
    }

    /**
     * Get dateDebut.
     *
     * @return \DateTime|null
     */
    public function getDateDebut()
    {
        //return DateTime::createFromFormat("j/m/Y H:i",$this->dateDebut);
        return $this->dateDebut->format("d/m/Y H:i");
    }

    /**
     * Set dateFin.
     *
     * @param \DateTime|null $dateFin
     *
     * @return Rdv
     */
    public function setDateFin($dateFin = null)
    {
        $this->dateFin = DateTime::createFromFormat("j/m/Y H:i",$dateFin);
        //$this->dateFin=$this->dateFin->format('Y-m-d H:i:s');
        
        return $this;
    }

    /**
     * Get dateFin.
     *
     * @return \DateTime|null
     */
    public function getDateFin()
    {
        return $this->dateFin->format("d/m/Y H:i");
    }
}

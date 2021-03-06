<?php
namespace Entity;
// src/Contact.php
use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */




class Contact
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
     * @ORM\Column(name="nom", type="string", nullable=false, unique=false)
     */
    protected $nom;
    
    /**
    *@ORM\Column(name="prenom", type="string", nullable=false, unique=false)
    */
    protected $prenom;

    /**
     *@ORM\Column(name="email", type="string", nullable=false, unique=false)
     */
    protected $email;
    
    /**
    *@ORM\Column(name="genre", type="string", nullable=false, unique=false)
    */
    protected $genre;
    
    /**
    *@ORM\Column(name="nationalite", type="string", nullable=false, unique=false)
    */
    protected $nationalite;
    
    /**
    *@ORM\Column(name="externe", type="boolean", nullable=false, unique=false)
    */
    protected $externe;
    
    /**
    *@ORM\Column(name="interne", type="boolean", nullable=false, unique=false)
    */
    protected $interne;
    
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
     * Set nom.
     *
     * @param string $nom
     *
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = strtoupper($nom);

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = ucfirst(strtolower($prenom));

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set genre.
     *
     * @param string $genre
     *
     * @return Contact
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre.
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set nationalite.
     *
     * @param string $nationalite
     *
     * @return Contact
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite.
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Set externe.
     *
     * @param string|null $externe
     *
     * @return Contact
     */
    public function setExterne($externe)
    {
        if($externe==null){
            $this->externe = false;
        } else {
            $this->externe = true;
        }
        return $this;
    }

    /**
     * Get externe.
     *
     * @return string|null
     */
    public function getExterne()
    {
        if($this->externe)
        {
            return 'vrai';
        } else {
            return 'faux';
        }
        
    }

    /**
     * Set interne.
     *
     * @param string|null $interne
     *
     * @return Contact
     */
    public function setInterne($interne)
    {
        $this->interne = $interne;

        return $this;
    }

    /**
     * Get interne.
     *
     * @return string|null
     */
    public function getInterne()
    {
        if($this->interne)
        {
            return 'vrai';
        } else {
            return 'faux';
        }
    }
}
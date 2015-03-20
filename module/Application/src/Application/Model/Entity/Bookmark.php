<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 30/01/2015
 * Time: 19:18
 */

namespace Application\Model\Entity;


class Bookmark {

    private $id;
    private $url;
    private $title;
    private $description;
    private $date;
    private $votes;
    private $idUser;

    function __construct($id = null, $url = null, $title = null, $description = null, $date = null, $votes = null, $idUser = null)
    {
        $this->id = $id;
        $this->name = $url;
        $this->id = $title;
        $this->id = $description;
        $this->id = $date;
        $this->id = $votes;
        $this->id = $idUser;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param mixed $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


    public  function exchangeArray($data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->url = (!empty($data['url'])) ? $data['url'] : null;
        $this->title = (!empty($data['title'])) ? $data['title'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
        $this->date = (!empty($data['date'])) ? $data['date'] : null;
        $this->votes = (!empty($data['votes'])) ? $data['votes'] : null;
        $this->idUser = (!empty($data['idUser'])) ? $data['idUser'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
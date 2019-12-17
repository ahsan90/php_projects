<?php
/*
##################################################
Author: Md Ahsanul Hoque
Date: November 4, 2019
Purpose: Album class for providing attributes and other members
##################################################
*/
class Album{
    private $title;
    private $artistName;
    private $publisher;
    private $genre;
    //private $price;
    //private $countryReleased;
    private $data = array();

    public function __construct($title, $artistName, $publisher, $genre)
    {
        $this->title = $title;
        $this->artistName = $artistName;
        $this->publisher = $publisher;
        $this->genre = $genre;

        echo "<h3>Album created</h3>";
    }

    public function __toString()
    {
        return "<br/><b>Album Title: </b>".$this->title.
            "<br/><b>Artist: </b>".$this->artistName.
            "<br/><b>Publisher: </b>".$this->publisher.
            "<br/><b>Genre: </b>".$this->genre;
    }
    /**
     * The __set() method (Magic Methods) is called whenever you attempt to write to
     * a non-existing or private property of an object.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if(property_exists($this,$name)) {

            $this->$name = $value;

        }else{
            //An associative array s created when a property that has not been declared is set
            $this->data[$name] = $value;

        }
    }

    /**
     * The __get() method (Magic Methods) is called whenever you attempt to read a non-existing
     * or private property of an object.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }else{
            //returns the value of the attribute even though it is private/hidden
            return $this->$name;
        }

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
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * @param mixed $artistName
     */
    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
}
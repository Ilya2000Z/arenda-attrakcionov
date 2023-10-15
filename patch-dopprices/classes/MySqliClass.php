<?php
namespace MyClasses;

class MySqliClass {

    protected $link;

    /*
     * examples
     *
     * $mas = $mysql->selectOne(
     * $r = $mysql->select(
     * $mysql->query(
     */

    function __construct($hostName, $userName, $password, $dbName)
    {
        $this->link = mysqli_connect($hostName, $userName, $password);
        if (!$this->link) {
            echo "Не могу соединиться с базой " . $dbName . "!<br>";
            echo mysqli_error($this->link);
            exit;
        }
        mysqli_select_db($this->link, $dbName);
        mysqli_query($this->link, "set names 'utf8'");
    }

    public function prepareVar($var)
    {
        $var = mysqli_real_escape_string($this->link, $var);
        return $var;
    }

    public function getLastInsertedId()
    {
        return mysqli_insert_id($this->link);
    }

    public function getError()
    {
        return mysqli_error($this->link);
    }

    public function select($query, $showError = true)
    {
        $q = mysqli_query($this->link, $query);

        if (!$q && $showError) {
            die(mysqli_error($this->link) . "<br>" . $query);
        }

        return $q;
    }

    public function selectOne($query)
    {
        $q = mysqli_query($this->link, $query);

        if (!$q) {
            die(mysqli_error($this->link) . "<br>" . $query);
        }

        return mysqli_fetch_array($q);
    }

    public function query($query)
    {
        $q = mysqli_query($this->link, $query);

        if (!$q) {
            die(mysqli_error($this->link) . "<br>" . $query);
        }

        return $q;
    }

}

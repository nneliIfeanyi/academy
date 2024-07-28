<?php
class Ui
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }



    public function pullCoreData()
    {
        $this->db->query("SELECT * FROM coredata;");

        $row = $this->db->single();

        return $row;
    }


    public function pullWhyChooseUs()
    {
        $this->db->query("SELECT * FROM whychooseus;");

        $results = $this->db->resultset();

        return $results;
    }


    public function pullCourses()
    {
        $this->db->query("SELECT * FROM courses;");

        $results = $this->db->resultset();

        return $results;
    }
}

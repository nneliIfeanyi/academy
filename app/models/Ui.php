<?php
class Ui
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    // Pull page data
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
    // Pull Page data ends //
    /////////////////////////////////////////
    ////////////////////////////////////////
    // Add page data
    public function addWhyChooseUs($data)
    {
        // Prepare Query
        $this->db->query('INSERT INTO whychooseus (title, info) 
      VALUES (:title, :info)');

        // Bind Values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':info', $data['info']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Add Post
    public function addCourse($data)
    {
        // Prepare Query
        $this->db->query('INSERT INTO courses (icon, title, dsc, duration, venue, price) 
      VALUES (:icon, :title, :dsc, :duration, :venue, :price)');

        // Bind Values
        $this->db->bind(':icon', $data['icon']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':dsc', $data['dsc']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':venue', $data['venue']);
        $this->db->bind(':price', $data['price']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Add page data ends //
    /////////////////////////////////////////
    ////////////////////////////////////////
    // Update page data
    public function updateCoreData($data)
    {
        // Prepare Query
        $this->db->query('UPDATE coredata SET showcaseh1 = :showcaseh1, showcasep = :showcasep, nextresumedate = :nextresumedate, enddate = :enddate, sessiontag = :sessiontag');

        // Bind Values
        $this->db->bind(':showcaseh1', $data['showcaseh1']);
        $this->db->bind(':showcasep', $data['showcasep']);
        $this->db->bind(':nextresumedate', $data['nextresumedate']);
        $this->db->bind(':enddate', $data['enddate']);
        $this->db->bind(':sessiontag', $data['sessiontag']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

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
        $this->db->query("SELECT * FROM courses");
        $results = $this->db->resultset();

        return $results;
    }
    public function pullCourses2()
    {
        $this->db->query("SELECT * FROM courses WHERE creator = :creator;");
        $this->db->bind(':creator', $_SESSION['creator_username']);
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
        $this->db->query('INSERT INTO courses (icon, title, dsc, duration, venue, price, requirement, creator) 
      VALUES (:icon, :title, :dsc, :duration, :venue, :price, :requirement, :creator)');

        // Bind Values
        $this->db->bind(':icon', $data['icon']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':dsc', $data['dsc']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':venue', $data['venue']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':requirement', $data['requirement']);
        $this->db->bind(':creator', $_SESSION['creator_username']);

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

    public function updateCourse($data)
    {
        // Prepare Query
        $this->db->query('UPDATE courses SET icon = :icon, title = :title, dsc = :dsc, duration = :duration, venue = :venue, price = :price, requirement = :requirement WHERE id = :id');

        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':icon', $data['icon']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':dsc', $data['dsc']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':venue', $data['venue']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':requirement', $data['requirement']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCourseAdvance($data)
    {
        // Prepare Query
        $this->db->query('UPDATE courses SET paylink = :paylink, discount = :discount, objectives = :objectives, curriculum = :curriculum WHERE id = :id');

        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':paylink', $data['paylink']);
        $this->db->bind(':discount', $data['discount']);
        $this->db->bind(':objectives', $data['objectives']);
        $this->db->bind(':curriculum', $data['curriculum']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateWhyChooseUs($data)
    {
        // Prepare Query
        $this->db->query('UPDATE coredata SET title = :title, info = :info');

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
    // Update page data ends //
    /////////////////////////////////////////
    ////////////////////////////////////////
    // 
    // Delete Function starts
    public function deleteCourse($id)
    {
        // Prepare Query
        $this->db->query('DELETE FROM courses WHERE id = :id');

        // Bind Values
        $this->db->bind(':id', $id);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteWhyChooseUs($id)
    {
        // Prepare Query
        $this->db->query('DELETE FROM whychooseus WHERE id = :id');

        // Bind Values
        $this->db->bind(':id', $id);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Delete Function ends //
    /////////////////////////////////////////
    ////////////////////////////////////////
    // 



    //  Messages Here
    public function insertMessage($data)
    {
        // Prepare Query
        $this->db->query('INSERT INTO messages (phone, messages) 
      VALUES (:phone, :messages)');

        // Bind Values
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':messages', $data['messages']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

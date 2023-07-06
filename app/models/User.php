<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      // Prepare Query
      $this->db->query('INSERT INTO students (full_name, user_name, sex, phone, passport, reg_date) 
      VALUES (:full_name, :user_name, :sex, :phone, :passport, :reg_date)');

      // Bind Values
      $this->db->bind(':full_name', $data['full_name']);
      $this->db->bind(':user_name', $data['user_name']);
      $this->db->bind(':sex', $data['sex']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':passport', $data['profile_pic']);
      $this->db->bind(':reg_date', $data['reg_date']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }



    public function verify($data){
      // Prepare Query
      $this->db->query('UPDATE students SET payment = :reciept WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':reciept', $data['status']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function reverse($data){
      // Prepare Query
      $this->db->query('UPDATE students SET payment = :reciept WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':reciept', $data['status']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


       // Find USer BY phone
    public function findUserByPhone($phone){
        $this->db->query("SELECT * FROM students WHERE phone = :phone");
        $this->db->bind(':phone', $phone);
  
        $row = $this->db->single();
  
        //Check Rows
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }


    public function findUser($user_name){
        $this->db->query("SELECT * FROM students WHERE user_name = :user_name");
        $this->db->bind(':user_name', $user_name);
  
        $row = $this->db->single();
  
        //Check Rows
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }

    // Login / Authenticate User
    public function login($user_name, $password){
      $this->db->query("SELECT * FROM students WHERE user_name = :user_name");
      $this->db->bind(':user_name', $user_name);

      $row = $this->db->single();
      
       //Check Rows
        if($row->phone == $password){
          return $row;
        } else {
          return false;
        }
      
    }


    public function allStudent(){

      $this->db->query("SELECT * FROM students ORDER BY id DESC");

      $results = $this->db->resultset();
  
      return $results;
    }

     // Login / Authenticate User
    public function paid($user_name){
      $this->db->query("SELECT * FROM students WHERE user_name = :user_name");
      $this->db->bind(':user_name', $user_name);

      $row = $this->db->single();
      
       //Check Rows
        if ($row->payment == 'yes') {
          return true;
        } else {
          return false;
        }
      
    }

    // Find User By ID
    public function getUserById($id){
      $this->db->query("SELECT * FROM students WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
  }
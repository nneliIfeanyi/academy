<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Add User / Register
  public function register($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO users (name, email, mobile, course, password) 
      VALUES (:name, :email, :mobile, :course, :password)');

    // Bind Values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':mobile', $data['mobile']);
    $this->db->bind(':course', $data['course']);
    $this->db->bind(':password', $data['password']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function registerStep2($data)
  {
    // Prepare Query
    $this->db->query('UPDATE users SET soo = :soo, address = :address, dob = :dob, gender = :gender WHERE email = :email');

    // Bind Values
    $this->db->bind(':soo', $data['soo']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':dob', $data['dob']);
    $this->db->bind(':gender', $data['gender']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Find USer BY Email
  public function findUserByEmail($email, $course)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email AND course = :course");
    $this->db->bind(':email', $email);
    $this->db->bind(':course', $course);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Find USer BY Email2
  public function findUserByEmail2($email)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  /////////////////////////////////////////
  //////////////////////////////////
  public function findCreatorByEmail($email)
  {
    $this->db->query("SELECT * FROM creators WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  // Get Course By Id
  public function getCourseById($id)
  {
    $this->db->query("SELECT * FROM courses WHERE id = :id");
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
  // Get Course By Course nme
  public function getCourseByTitle($title)
  {
    $this->db->query("SELECT * FROM courses WHERE title = :title");
    $this->db->bind(':title', $title);

    $row = $this->db->single();

    return $row;
  }

  public function checkPromoCode($code)
  {
    $this->db->query("SELECT * FROM codes WHERE code = :code");
    $this->db->bind(':code', $code);

    $this->db->single();
    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Login / Authenticate User
  public function login($email, $password)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Login / Authenticate User
  public function creatorLogin($email, $password)
  {
    $this->db->query("SELECT * FROM creators WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    if ($password = $row->password) {
      return $row;
    } else {
      return false;
    }
  }

  // Find User By ID
  public function getUserById($id)
  {
    $this->db->query("SELECT * FROM users WHERE id = :id");
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}

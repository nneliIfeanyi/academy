<?php
  class Post {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    // Get All Posts
    public function getPosts(){
      $this->db->query("SELECT *, 
                        posts.id as postId, 
                        students.id as userId
                        FROM posts 
                        INNER JOIN students 
                        ON posts.user_id = students.id;");

      $results = $this->db->resultset();

      return $results;
    }



         // Get comment row count
    public function getCommentRowCount($id){
      $this->db->query("SELECT * FROM comment WHERE post_id = :post_id");

      $this->db->bind(':post_id', $id);
      
      $row = $this->db->single();

      if ($this->db->rowCount() > 0) {
        return $this->db->rowCount();
      }else{

        return false;
      }
    }

      // Get commenter
    public function getCommenter($id){
      $this->db->query("SELECT * FROM users WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      if ($this->db->rowCount() > 0) {
        return $row;
      }else{

        return false;
      }
    }

     // Get comments per post
    public function getComments($id){
      $this->db->query("SELECT * FROM comment WHERE post_id = :post_id");

      $this->db->bind(':post_id', $id);
      
      $results = $this->db->resultset();

      return $results;
    }


    // Add Comment
    public function addComment($data){
      // Prepare Query
      $this->db->query('INSERT INTO comment (post_id, user_id, comment, commenter, post_date, post_time) 
      VALUES (:post_id, :user_id, :body, :commenter, :post_date, :post_time)');

      // Bind Values
      $this->db->bind(':post_id', $data['post_id']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':commenter', $data['user_name']);
      $this->db->bind(':post_date', $data['date']);
      $this->db->bind(':post_time', $data['time']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }







    // Get Post By ID
    public function getPostById($id){
      $this->db->query("SELECT * FROM posts WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

    // Add Post
    public function addPost($data){
      // Prepare Query
      $this->db->query('INSERT INTO posts (title, user_id, body) 
      VALUES (:title, :user_id, :body)');

      // Bind Values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

        // Add Post
    public function addPost2($data){
      // Prepare Query
      $this->db->query('INSERT INTO posts (title, user_id, post_img, body) 
      VALUES (:title, :user_id, :post_img, :body)');

      // Bind Values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':post_img', $data['post_pic']);
      $this->db->bind(':body', $data['body']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Update Post
    public function updatePost($data){
      // Prepare Query
      $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete Post
    public function deletePost($id){
      // Prepare Query
      $this->db->query('DELETE FROM posts WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
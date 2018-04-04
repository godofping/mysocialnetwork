<?php
  class Post {
    private $db;
    
    public function __construct(){
      $this->db = new Database; 
    }

    // Get All Public Posts
    public function getPublicPosts(){
      $this->db->query("SELECT *, 
                        posts.id as postId, 
                        users.id as userId
                        FROM posts 
                        INNER JOIN users 
                        ON posts.user_id = users.id
                        WHERE visibility = 'Public'
                        ORDER BY posts.created_at DESC;");

      $results = $this->db->resultset();

      return $results;
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
      $this->db->query('INSERT INTO posts (title, user_id, body, visibility) 
      VALUES (:title, :user_id, :body, :visibility)');

      // Bind Values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':visibility', $data['visibility']);
      
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
      $this->db->query('UPDATE posts SET title = :title, body = :body, visibility = :visibility WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':visibility', $data['visibility']);

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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model{
    function __construct()
    {
      parent::__construct();
    }

    public function getUser()
    {
		  return $this->db->query("SELECT * FROM users")->result();
    }

    public function getUserId(int $id)
    {
      $sql = "SELECT * FROM users WHERE id = {$id}";      
      return $this->db->query($sql)->row();
    }

    public function setUser(string $name, string $email)
    {
      $sql = "INSERT INTO users (name, email) VALUES ('".$this->db->escape_str($name)."', '".$this->db->escape_str($email)."')";
      return $this->db->query($sql);
    }

    public function updateUser(int $id, string $name, string $email)
    {
      $sql = "UPDATE users SET name = '{$name}', email = '{$email}' WHERE id = {$id}";
      return $this->db->query($sql);
    }

    public function deleteUser(int $id)
    {
      $sql = "DELETE FROM users WHERE id = {$id}";
      return $this->db->query($sql);
    }
}
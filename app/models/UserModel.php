<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model
{
    protected $table = 'user';

    public function find_by_username($username)
    {
        return $this->db
            ->table($this->table)
            ->where('username', $username)
            ->get();
    }

    public function register_user($data)
    {
        return $this->db
            ->table($this->table)
            ->insert($data);
    }
}
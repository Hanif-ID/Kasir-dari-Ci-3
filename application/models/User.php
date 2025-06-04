<?php
class User Extends Ci_model
{
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
        }

    public function register($data)
    {
        return $this->db->insert('users', $data);
    }
}
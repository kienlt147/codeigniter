<?php
class User_model extends CI_Model {

    public $id;
    public $username;
    public $password;
    public $fullname;
    public $current_sign_in_at;
    public $last_sign_in_at;
    public $current_sign_in_ip;
    public $last_sign_in_ip;
    public $created_at;
    public $permision;

    const KEY_WORD = '!@#$%codeignter';
    const ADMIN = 1;

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $request = $this->input;
        $this->username = $request->post('username');
        $this->fullname = $request->post('fullname');
        $this->password = md5(self::KEY_WORD . $request->post('password'));
        $this->current_sign_in_at = date('Y-m-d H:i:s');
        $this->last_sign_in_at = date('Y-m-d H:i:s');
        $this->current_sign_in_ip = date('Y-m-d H:i:s');
        $this->last_sign_in_ip = date('Y-m-d H:i:s');
        $this->created_at = date('Y-m-d H:i:s');
        $this->permision = self::ADMIN;
        return $this->db->insert('users', $this);
    }

    public function checkPermission($id)
    {
        $user = $this->db->get_where('users', [
            'id' => $id,
            'permision' => self::ADMIN
        ]);
        return !empty($user->row()) ? true : false;
    }

    public function filter_by_username_password()
    {
        $request = $this->input;
        $this->db->select('id, fullname');
        return $this->db->get_where('users', [
            'username' => $request->post('username'),
            'password' => md5(self::KEY_WORD . $request->post('password')),
            'permision' => self::ADMIN
        ]);
    }

    public function encrypt($user)
    {
        return $this->encrypt->encode($user->id);
    }

    public function decrypt()
    {
        return $this->encrypt->decode($this->session->session_id);
    }

}
?>
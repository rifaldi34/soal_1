<?php

class M_cms extends CI_Model
{
	private $_table = "s_user";
	const SESSION_KEY = 'ID';

	public function login($username, $password)
	{
		$this->db->where('USERNAME LIKE BINARY', $username);//->or_where('username', $username);
		$query = $this->db->get($this->_table);
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $user->PASSWORD)) {
			return FALSE;
		}

		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $user->USERNAME]);
		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

    public function insertGeneralData($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function updateSingularData($table, $data, $filter, $query)
    {
        $this->db->where($filter, $query);

        $query = $this->db->update($table, $data);

        return $query;
    }

    public function getSingularData($table, $column, $data)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column, $data);

        $query = $this->db->get();

        return $query;
    }

    public function deleteSingularData($table, $filter, $query)
    {
        $query = $this->db->where($filter, $query)
            ->delete($table);

        return $query;
    }



}

?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Home extends CI_Model
{

    function jadwal()
    {
        $query = $this->db->query("SELECT * FROM tb_jadwal ORDER BY id ASC");
        return $query->result();
    }

}
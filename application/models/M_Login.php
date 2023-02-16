<?php

class M_Login extends CI_Model
{

     function query_validasi_email($username){
    	$result = $this->db->query("SELECT * FROM tb_user WHERE nik = '$username' OR user = '$username'");
        return $result;
    }

    function query_validasi_password($username,$password){
    	//$result = $this->db->query("SELECT * FROM table_user WHERE user_email='$email' AND user_password=SHA2('$password', 224) LIMIT 1");
        $result = $this->db->query("SELECT A.id, A.nik, A.nama, A.level, A.email, A.kode_wilayah, A.kode_instansi, A.allow, A.pass,
         B.nama as nm_level, C.nama as nm_instansi, D.daerah as nm_daerah, D.provinsi as nm_provinsi
             FROM tb_user AS A
             LEFT JOIN tb_hak_akses AS B ON A.level=B.id
             LEFT JOIN tb_instansi AS C ON A.kode_instansi=B.id
             LEFT JOIN tb_wilayah AS D ON A.kode_wilayah=D.id
             WHERE  A.nik = '$username' OR A.user = '$username' ");
             $dt = $result->row();
					if ($dt->pass == $password) {
                        return $result;
                    } else {
                        return false;
                    } 
    }

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

	 function validasi_idcard($nik){
    	$result = $this->db->query("SELECT * FROM tb_user WHERE nik = '$nik'");
        return $result;
    }
	 function validasi_username($username){
    	$result = $this->db->query("SELECT * FROM tb_user WHERE user = '$username'");
        return $result;
    }
	function register($nik, $username, $nama_lengkap, $email, $instansi, $wilayah, $password)
    {

        $insert = 'INSERT INTO `tb_user`(`nik`, `user`, `pass`, `email`, `nama`, `level`, `kode_wilayah`, `kode_instansi`, `allow`) 
            VALUES (
            "' . $nik . '",
            "' . $username . '",
            "' . $password . '",
            "' . $email . '",
            "' . $nama_lengkap . '",
			"3",
            "' . $wilayah . '",
            "' . $instansi . '",
            "1"
            )';
        return $this->db->query($insert);
    }

}
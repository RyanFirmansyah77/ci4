<?php namespace App\Models;

use CodeIgniter\Model;

class Komik_model extends Model
{
	protected $table      = 'komik';
	protected $useTimestamps = true;

	protected $allowedFields = ['judul','slug','penerbit','penulis','sampul'];

	function getKomik($slug =false){
		if ($slug == false) {
			return $this->findAll();
		}
		return $this->where(['slug' => $slug])->first();
	}
}
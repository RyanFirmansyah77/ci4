<?php namespace App\Controllers;
use \App\Models\Komik_model;
class Komik extends BaseController
{
	protected $komikModel;

	public function __construct(){

		$this->komikModel = new Komik_model();
	}
	public function index()
	{
		
		// $komik = $this->komikModel->findAll();
		$data = [
			'title'=>'Daftar Komik',
			'komik' => $this->komikModel->getKomik()
		];
		return view('/komik/index',$data);
	}

	public function detail($slug){
		$data = [
			'title' => 'Detail Komik',
			'komik' =>$this->komikModel->getKomik($slug)

		];
		if (empty($data['komik'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundxception('Judul Komik'. $slug .'tidak ada');
			
		}
		return view('komik/detail',$data);

	}

	public function create(){
		// session();
		$data = [
			'title' => 'Form data Komik',
			'validation' =>\Config\Services::validation()
		];
		return view('komik/create',$data);
	}
	public function save(){
	
		if (!$this->validate([
			'judul' =>[
				'rules' => 'required|is_unique[komik.judul]',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} tidak boleh sama/sudah ada'

				]
			],
			'penerbit' => 'required',
			'penulis' => 'required',
			'sampul' => [
				'rules' =>'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'uploaded' => 'pilih gambar dulu',
					'max_size' => 'gambar terlalu besar' ,
					'is_image' => 'yang anda pilih bukan gambar' ,
					'mime_in' => 'yang anda pilih bukan gambar'

				]

			]
		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/komik/create')->withInput()->with('validation',$validation);
			return redirect()->to('/komik/create')->withInput();
		}

 
		$slug = url_title($this->request->getVar('judul'),'-,true');
		$this ->komikModel->save([
			'judul' => $this->request->getVar('judul'),
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $this->request->getVar('sampul'),
			'slug' => $slug
		]);
		session()->setFlashdata('pesan','data telah ditambahkan');
		return redirect()->to('/komik');
	}
	function delete($id){
		$this->komikModel->delete($id);
		session()->setFlashdata('pesan','data telah dihapus');
		return redirect()->to('/komik');
	}
	function edit($slug){
		$data = [
			'title' => 'Form ubah Komik',
			'validation' =>\Config\Services::validation(),
			'komik' =>$this->komikModel->getKomik($slug)
		];
		return view('komik/edit',$data);
	}
	function update($id){
		$komiklama = $this->komikModel->getKomik($this->request->getVar('slug'));
		if ($komiklama['judul'] == $this->request->getVar('judul')) {
			$rule = 'required';
		}else{
			$rule = 'required|is_unique[komik.judul]';
		}
		if (!$this->validate([
			'judul' =>[
				'rules' => $rule,
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} tidak boleh sama/sudah ada'

				]
			],
			'penerbit' => 'required',
			'penulis' => 'required'
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/komik/edit/'. $this->request->getVar('slug'))->withInput()->with('validation',$validation);

		}
		$slug = url_title($this->request->getVar('judul'),'-,true');
		$this ->komikModel->save([
			'id' => $id,
			'judul' => $this->request->getVar('judul'),
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $this->request->getVar('sampul'),
			'slug' => $slug
		]);
		session()->setFlashdata('pesan','data telah diubah');
		return redirect()->to('/komik');
	}
}

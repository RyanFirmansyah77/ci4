<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data =[
			'title' => 'Home | Ryan'

		];
		
		return view('pages/home' ,$data); 
	

	}

	//--------------------------------------------------------------------
	public function about()
	{
		$data =[
			'title' => 'About | Ryan'

		];

		return view('pages/about',$data);

	}
	public function contact(){
		$data =[
			'title' => 'Contact | Ryan',
			'alamat' => [
				[
					'tipe'=>'rumah',
					'alamat'=>'Jalan.Kerto Raharjo 77',
					'kota'=> 'Bandung'

				],
				[
					'tipe'=>'kantor',
					'alamat'=>'Jalan-Jalan',
					'kota'=>'Malang'



				]
			]
		];
		return view('pages/contact',$data);
	}

}

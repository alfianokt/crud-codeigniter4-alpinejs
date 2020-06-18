<?php namespace App\Controllers;

use App\Models\Buku; // model terletak di app/Models/Buku.php
use CodeIgniter\API\ResponseTrait; // untuk membuat response json (REST API)

class Home extends BaseController
{
	use ResponseTrait;

	public function __construct()
	{
		// karena nantinya setiap fungsi akan memanggil model buku
		// maka saya inisiasi di __construct
		$this->buku = new Buku();
	}

	// halaman utama
	public function index()
	{
		$data = [
			'buku' => $this->buku->findAll()
		];

		// panggil view terletak di app/Views/main.php
		return view('main', $data);
	}

	// dapatkan semua data buku
	// url /buku method GET
	public function get_buku ()
	{
		return $this->respond($this->buku->findAll(), 200);
	}

	// tambah data buku
	// url /buku method POST
	public function post_buku ()
	{
		$data = [
			'buku_nama' => $this->request->getJSON()->nama
		];
		$status = $this->buku->save($data);

		return $this->respond(compact('status'), 200);
	}

	// update data buku
	// url /buku method PUT
	public function put_buku ()
	{
		$status = $this->buku->update($this->request->getJSON()->id, ['buku_nama' => $this->request->getJSON()->nama]);

		return $this->respond(compact('status'), 200);
	}

	// hapus data buku
	// url /buku method DELETE
	public function delete_buku ()
	{
		$status = $this->buku->delete($this->request->getJSON()->id);

		return $this->respond(compact('status'), 200);
	}

}

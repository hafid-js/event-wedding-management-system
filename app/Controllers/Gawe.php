<?php

namespace App\Controllers;

class Gawe extends BaseController
{
    public function index()
    {
        // cara 1 : query builder
        $builder = $this->db->table('gawe');
        $query = $builder->get();

        // cara 2 : query manual
        // $query = $this->db->query("SELECT * FROM gawe");



        $data['gawe'] = $query->getResult();

        return view('gawe/get', $data);
    }

    public function create() {
        return view('gawe/add');
    }

    public function store() {
        $data = $this->request->getPost();
        $this->db->table('gawe')->insert($data);

        if($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Disimpan');
        }
    }
}

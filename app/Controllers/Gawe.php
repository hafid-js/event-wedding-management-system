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

    public function create()
    {
        return view('gawe/add');
    }

    public function store()
    {

        // cara 1 : name jika sama dengan yang di database
        // $data = $this->request->getPost();

        // cara 2 : name spesifik

        $validate = $this->validate ([
            'name_gawe' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama gawe tidak boleh kosong',
                    'min_length' => 'Nama gawe minimal 3 karakter'
                ],
            ],
            'date_gawe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal gawe tidak boleh kosong',
                ],
            ],
        ]);

        if($validate){
            $data = [
                'name_gawe' => $this->request->getVar('name_gawe'),
                'date_gawe' => $this->request->getVar('date_gawe'),
                'info_gawe' => $this->request->getVar('info_gawe'),
            ];
    
            $this->db->table('gawe')->insert($data);
    
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Disimpan');
            }
        } else {
            $data['validation'] = $this->validator;
            return view('gawe/add', $data);
        } 

        

       
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('gawe')->getWhere([
                'id_gawe' => $id
            ]);
            if ($query->resultID->num_rows > 0) {
                $data['gawe'] = $query->getRow();
                return view('gawe/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update($id)
    {
        // cara 1 : bila nama field dan isi tabel sama
        // $data = $this->request->getPost();
        // unset($data['_method']);


        // cara 2 : bila nama field dan isi tabel berbeda
       



        $validate = $this->validate ([
            'name_gawe' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama gawe tidak boleh kosong',
                    'min_length' => 'Nama gawe minimal 3 karakter'
                ],
            ],
            'date_gawe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal gawe tidak boleh kosong',
                ],
            ],
        ]);

        if($validate){
            $data = [
                'name_gawe' => $this->request->getVar('name_gawe'),
                'date_gawe' => $this->request->getVar('date_gawe'),
                'info_gawe' => $this->request->getVar('info_gawe'),
            ];
    
            $this->db->table('gawe')->where([
                'id_gawe' => $id
            ])->update($data);
            return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->back()->withInput();
        } 
    }

    public function destroy($id)
    {
        $this->db->table('gawe')->where([
            'id_gawe' => $id
        ])->delete();
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Dihapus');
    }
}

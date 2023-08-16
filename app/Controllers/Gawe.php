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
}

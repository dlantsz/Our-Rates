<?php

namespace App\Models;

use CodeIgniter\Model;

class AspSeaFreightFCLModel extends Model
{
    
    protected $table = 'asp_sea_freight_fcl';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'asp_id', 'destination', 'freight_cost', 'last_update', 'user_id'

    ];


    public function read()
    {

        $builder = $this->db->table('asp_sea_freight_fcl');
        $builder->where('asp_id', '7');
        $query = $builder->get();


        return $query;

    }

    public function getNote()
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('notes_for','AspSeaFCL');
        $query = $builder->get();

        return $query->getRow();

    }


    public function lastupdate()
    {

        $builder = $this->db->table('asp_sea_freight_fcl a');
        $builder->join('user_tbl b', 'a.user_id = b.user_id','INNER');
        $builder->join('asp_tbl c', 'a.asp_id = c.asp_id','INNER');
        $builder->where('c.asp_header','SEA FREIGHT FCL RATE');
        $query = $builder->get();

        return $query->getRow();


    }

    public function updatenotes($data,$id)
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('id',$id);
        $builder->update($data);
    }





}
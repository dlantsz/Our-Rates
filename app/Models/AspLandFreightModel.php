<?php

namespace App\Models;

use CodeIgniter\Model;

class AspLandFreightModel extends Model
{
    
    protected $table = 'asp_land_freight';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'asp_id', 'destination', 'area', 'perkg', 'percbm', 'last_update', 'user_id'

    ];


    public function read()
    {

        $builder = $this->db->table('asp_land_freight');
        $builder->where('asp_id', '4');
        $query = $builder->get();
        return $query;

    }

    public function getNote()
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('asp_id','4');
        $query = $builder->get();

        return $query->getRow();

    }


    public function lastupdate()
    {

        $builder = $this->db->table('asp_land_freight a');
        $builder->join('user_tbl b', 'a.user_id = b.user_id','INNER');
        $builder->join('asp_tbl c', 'a.asp_id = c.asp_id','INNER');
        $builder->where('c.asp_header','LAND FREIGHT LOOSE TRUCK LOAD / CONSOLE');
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
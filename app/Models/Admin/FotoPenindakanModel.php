<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class FotoPenindakanModel extends Model
{
    protected $table            = 'foto_penindakan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['bap_id', 'foto_penindakan_1', 'foto_penindakan_2'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getFotoPenindakan()
    {
        return $this->table($this->table)
            ->orderBy('id desc')
            ->get()->getResultObject();
    }
}

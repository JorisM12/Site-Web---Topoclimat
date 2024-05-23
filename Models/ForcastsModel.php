<?php 

namespace App\Models;

class ForcastsModel extends Model
{
    protected $id_for;
    protected $date_for;
    protected $data_for;
    protected $is_active_for;

    public function __construct()
    {
        $this->table = 'forcasts';
    }

}
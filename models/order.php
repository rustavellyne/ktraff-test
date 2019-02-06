<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 2/5/2019
 * Time: 17:27
 */

class Order extends Model
{
    public function getRequests()
    {
        $sql = "SELECT req.id as Order_Number, offers.name as Product_Name, req.price, req.count, op.fio
                  FROM requests AS req 
                  JOIN offers 
                  ON offers.id=req.offer_id
                  JOIN operators as op
                  ON op.id=req.operator_id
                  WHERE req.count > 2 AND op.id IN(10, 12);
                ";
        $result = $this->db->query($sql);
        return $result;
    }

}



<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 2/5/2019
 * Time: 17:27
 */

class Product extends Model
{

    public function getOffers()
    {
        $sql = "SELECT offers.name as Product_Name, SUM(req.count) as Summary_Count,req.price, SUM(req.count)*req.price as total_price
                FROM requests as req
                JOIN offers
                ON req.offer_id = offers.id
                GROUP by offers.id";


        return $this->db->query($sql);
    }


}



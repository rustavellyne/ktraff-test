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
        $sql = "select * from offers";

        return $this->db->query($sql);
    }

    public function getRequests()
    {
        $sql = "select * from requests";
        $result = $this->db->query($sql);
        return $result;
    }
}
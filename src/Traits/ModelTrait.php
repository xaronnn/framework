<?php

namespace Eskirex\Component\Framework\Traits;

trait ModelTrait
{
    use ModelCommonTrait;


    private function doInsert()
    {
        print_r(self::buildQuery()
            ->select('*')
            ->execute()
            ->fetchAll());
    }


    private function doUpdate()
    {
        echo 'doUpdate';
    }


    private function doDelete()
    {
        echo 'doDelete';
    }
}
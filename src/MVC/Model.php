<?php

namespace Eskirex\Component\Web\MVC;

use Eskirex\Component\Config\Config;
use Eskirex\Component\Web\Traits\ModelTrait;

class Model
{
    use ModelTrait;


    public static function queryBuilder()
    {
        return self::buildQuery();
    }


    public static function insert()
    {
        return self::doInsert();
    }


    public static function update()
    {
        return self::doUpdate();
    }


    public static function delete()
    {
        return self::doDelete();
    }
}

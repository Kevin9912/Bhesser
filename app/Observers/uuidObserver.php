<?php

namespace App\Observers;

use Webpatser\Uuid\Uuid;
/**
 * Class UuidObserver
 * @package App\Observers
 */
class uuidObserver
{
    /**
     * @param $model
     * @throws \Exception
     */
    public function creating($model)
    {
        if (empty($model->id)) {
            $model->id = Uuid::generate(4);
        }
    }
}
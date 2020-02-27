<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Reservation extends Entity
{

    protected $_accessible = [
        '*' => true,
    ];

    /**
     * 利用開始時間を H:i で返す
     *
     * @return mixed
     */
    public function _getStartTime()
    {

        if ($this->start) return $this->start->format('H:i');

        return '';

    }

    /**
     * 利用終了時間を H:i で返す
     *
     * @return mixed
     */
    public function _getEndTime()
    {

        if ($this->end) return $this->end->format('H:i');

        return '';

    }

}

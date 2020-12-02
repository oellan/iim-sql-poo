<?php

namespace App\Controller;

use App\Model\UserModel;
use DateTime;

class HeartbeatController
    extends AbstractController
{

    public function __construct()
    {
        parent::__construct(new UserModel());
    }

    public function execute()
    {
        if (!array_key_exists('timestamp', $_POST)) {
            return;
        }
        $timestamp = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['timestamp']);
        $this->model->setLastSeen($timestamp);
    }
}
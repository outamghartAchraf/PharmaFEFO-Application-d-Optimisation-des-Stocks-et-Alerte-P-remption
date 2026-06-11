<?php

require_once __DIR__ . '/../Repository/BatchRepository.php';

class NotificationController
{
    public static function index()
    {
        $expiredBatches = BatchRepository::getExpiredBatches();

        $expiringBatches = BatchRepository::getExpiringBatches(90);

        include __DIR__ .
        '/../../views/templates/dashboard/notifications/index.php';
    }
}
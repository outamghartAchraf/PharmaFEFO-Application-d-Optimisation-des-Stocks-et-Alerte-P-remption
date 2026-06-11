<?php

require_once __DIR__ . '/../Repository/ReportRepository.php';

class ReportController
{
 
    public static function index()
    {
        
        $statistics = ReportRepository::getStatistics();

        include __DIR__ . '/../../views/templates/dashboard/reports/index.php';
    }
 
    public static function stock()
    {
        $reports = ReportRepository::getCurrentStockReport();

        include __DIR__ . '/../../views/templates/dashboard/reports/stock.php';
    }

 
    public static function expired()
    {
        $reports = ReportRepository::getExpiredReport();

        include __DIR__ . '/../../views/templates/dashboard/reports/expired.php';
    }

 
    public static function expiringSoon()
    {
        $reports = ReportRepository::getExpiringSoonReport();

        include __DIR__ . '/../../views/templates/dashboard/reports/expiring.php';
    }

 
    public static function movements()
    {
        $reports = ReportRepository::getMovementsReport();

        include __DIR__ . '/../../views/templates/dashboard/reports/movements.php';
    }
}
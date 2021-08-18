<?php
namespace Webappdev\Knightsclub\models;

use PDO;

class Sitemap{
    public function PublicSiteMap($db)
    {
        $sql = "SELECT * FROM sitemap WHERE LoggedIn = 0";
        $pdostmt = $db->prepare($sql);

        $pdostmt->execute();

        $sitemap = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $sitemap;
    }
    public function LogInSiteMap($db)
    {
        $sql = "SELECT * FROM sitemap";
        $pdostmt = $db->prepare($sql);

        $pdostmt->execute();

        $sitemap = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $sitemap;
    }
}
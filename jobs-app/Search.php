<?php
require __DIR__ . '/class/Model/Company.php';
require __DIR__ . '/class/Service/CompanyLoader.php';
require __DIR__ . '/class/Service/SearchManager.php';

$companyLoader = new CompanyLoader();

$searchManager = new SearchManager();

$personBadges = array( 'bike', 'drivers_licence' );

$companies = $companyLoader->getCompanies();

$approvedCompanies = $searchManager->searchCompanies($personBadges, $companies);

var_dump($approvedCompanies);

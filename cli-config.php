<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\BaseModel;
$db = new BaseModel();
return ConsoleRunner::createHelperSet($db->entityManager);
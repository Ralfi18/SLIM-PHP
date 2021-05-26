<?php
namespace App;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class BaseModel {
    protected $isDevMode = true;
    protected $proxyDir = null;
    protected $cache = null;
    protected $useSimpleAnnotationReader = false;
    public $entityManager = null;
    protected $table;
    public function __construct()
    {
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'cr00n',
            'dbname'   => 'test_slim',
        );
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/"), $this->isDevMode, $this->proxyDir, $this->cache, $this->useSimpleAnnotationReader);
        $this->entityManager = EntityManager::create($dbParams, $config);
    }

    public function find($id)
    {
        return $this->entityManager->find(get_called_class(), $id);
    }

    public function findAll()
    {
        return $this->entityManager->getRepository(get_called_class())->findAll();
    }

    public function save($entity = null)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}
<?php
class Application {

    protected $connection;
    protected $record;
    protected $queryBuiler;

    public function __construct(AbstractFactoryInterface $serviceFactory)
    {
        $this->connection = $serviceFactory->createDBConnection();
        $this->record = $serviceFactory->createDBRecrord();
        $this->queryBuiler = $serviceFactory->createDBQueryBuiler();

    }
}

interface DBConnectionInterface {};
interface DBRecordInterface {};
interface DBQueryBuilerInterface {};

class MySqlConnection implements DBConnectionInterface {}
class MySqlRecord implements DBRecordInterface {}
class MySqlQueryBuiler implements DBQueryBuilerInterface {}

class PostgreSQLConnection implements DBConnectionInterface {}
class PostgreSQLRecord implements DBRecordInterface {}
class PostgreSQLQueryBuiler implements DBQueryBuilerInterface {}

class OracleConnection implements DBConnectionInterface {}
class OracleRecord implements DBRecordInterface {}
class OracleQueryBuiler implements DBQueryBuilerInterface {}


interface AbstractFactoryInterface 
{
    public function createDBConnection(): DBConnectionInterface;
    public function createDBRecrord(): DBRecordInterface;
    public function createDBQueryBuiler(): DBQueryBuilerInterface;
}

class MySQLFactory implements AbstractFactoryInterface
{
    public function createDBConnection(): DBConnectionInterface
    {
        return new MySqlConnection();
    }
    public function createDBRecrord(): DBRecordInterface
    {
        return new MySqlRecord();
    }
    public function createDBQueryBuiler(): DBQueryBuilerInterface
    {
        return new MySqlQueryBuiler();
    }
}

class PostgreSQLFactory implements AbstractFactoryInterface
{
    public function createDBConnection(): DBConnectionInterface
    {
        return new PostgreSQLConnection();
    }
    public function createDBRecrord(): DBRecordInterface
    {
        return new PostgreSQLRecord();
    }
    public function createDBQueryBuiler(): DBQueryBuilerInterface
    {
        return new PostgreSQLQueryBuiler();
    }
}

class OracleFactory implements AbstractFactoryInterface
{
    public function createDBConnection(): DBConnectionInterface
    {
        return new OracleConnection();
    }
    public function createDBRecrord(): DBRecordInterface
    {
        return new OracleRecord();
    }
    public function createDBQueryBuiler(): DBQueryBuilerInterface
    {
        return new OracleQueryBuiler();
    }
}

$application = new Application(
    new MySQLFactory()
);


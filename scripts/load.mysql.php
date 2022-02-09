<?php
echo 'I am here.';
try {
    // Connecting to a Database using the Adapter Factory Method
    $db = Zend_Db::factory('Pdo_Mysql', array(
        'host'     => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'dbname'   => 'test'
    ));
    echo $db->getConnection();
    // echo 'Database connected.';
    // Inserting in a Table
    $data = array(
        'created_on'      => '2007-03-22',
        'bug_description' => 'Something wrong',
        'bug_status'      => 'NEW'
    );
    
    $db->insert('bugs', $data);
} catch (Zend_Db_Adapter_Exception $e) {
    // perhaps a failed login credential, or perhaps the RDBMS is not running
    echo 'AN ERROR HAS OCCURED WITH DB_ADAPTER:' . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    return false;
} catch (Zend_Exception $e) {
    // perhaps factory() failed to load the specified Adapter class
    echo 'AN ERROR HAS OCCURED:' . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    return false;
}

// generally speaking, this script will be run from the command line
return true;
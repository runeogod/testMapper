<?php
require __DIR__ . '/../bootstrap.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS flight (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        depart_airport_id INT NOT NULL,
        destination_airport_id INT NOT NULL,
        gate VARCHAR(20),
        depart_id INT NOT NULL,
        destination_id INT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO flight
        (id, name, depart_airport_id, destination_airport_id, gate, depart_id, destination_id)
    VALUES
        (1, 'Air Sweden', 3, 4),
EOS;

try {
    $createTable = $db->exec($statement);
    if($createTable) {
        echo "Success!\n";
    } else { 
        var_dump($db->errorInfo());
    }

    } catch (\PDOException $e) {
    exit($e->getMessage());
}
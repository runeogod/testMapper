<?php
require __DIR__ . '/../bootstrap.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS city (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        zipcode FLOAT NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO city
        (id, name, lat, lng)
    VALUES
        (1, 'Madrid', '28001', null),
        (2, 'Barcelona', '08001', null),
        (3, 'Stockholm', '10465', null),
        (4, 'New York , '10001', null),
        (5, 'Gerona , '10001', null),
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
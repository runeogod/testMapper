<?php
require __DIR__ . '/../bootstrap.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS bus (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        depart VARCHAR(200) NOT NULL,
        depart_at VARCHAR(200) NOT NULL,
        destination INT NOT NULL,
        city_id INT NOT NULL,
        airport_id INT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO bus
        (id, name, depart, depart_at, destination, city_id, airport_id)
    VALUES
        (1, 'Barcelona', 'Extramuros 74', '9:30', 4, 2, 2),
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
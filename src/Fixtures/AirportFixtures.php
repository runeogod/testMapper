<?php
require __DIR__ . '/../bootstrap.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS airport (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        lat FLOAT NULL,
        lng FLOAT NULL,
        city_id INT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO airport
        (id, name, lat, lng)
    VALUES
        (1, 'Stockholm', '48.7277', '2.367079999999987', 3,null),
        (2, 'Gerona Airport', '41.9044', '2.76299', 5, null),
        (3, 'New York', '40.6441666667', '-73.7822222222', 4,null),

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
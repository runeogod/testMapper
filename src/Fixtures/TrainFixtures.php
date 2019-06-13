<?php
require __DIR__ . '/../bootstrap.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS train (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        city_id INT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO train
        (id, name, lat, lng)
    VALUES
        (1, 'Madrid TGV', 1,null),
        (2, 'Barcelona TGV', 2,null),

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
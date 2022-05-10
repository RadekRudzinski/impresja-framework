<?php

class m0001_initial
{
    public function up()
    {
        $db = \impresja\impresja\Application::$app->db;
        $query = 'CREATE TABLE imp_users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            password  VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE = INNODB';
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = \impresja\impresja\Application::$app->db;
        $query = 'DROP TABLE imp_users;';
        $db->pdo->exec($query);
    }
}

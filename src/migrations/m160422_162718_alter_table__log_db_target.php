<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2015
 */
use yii\db\Schema;
use yii\db\Migration;

class m160422_162718_alter_table__log_db_target extends Migration
{
    public function safeUp()
    {

        $sql = <<<SQL
ALTER TABLE `log_db_target` CHANGE `message` `message` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
SQL;

        $this->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        $sql = <<<SQL
ALTER TABLE `log_db_target` CHANGE `message` `message` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
SQL;

        $this->db->createCommand($sql)->execute();
    }
}

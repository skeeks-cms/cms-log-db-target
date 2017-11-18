<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2015
 */
use yii\db\Schema;
use yii\db\Migration;

class m150715_162718_create_table__log_db_target extends Migration
{
    public function safeUp()
    {
        $tableName = '{{%log_db_target}}';
        $tableExist = $this->db->getTableSchema($tableName, true);
        if ($tableExist)
        {
            return true;
        }

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable($tableName, [
            'id' => $this->primaryKey(),

            'level' => $this->integer(),
            'category' => $this->string(255),

            'log_time' => $this->integer(),

            'prefix' => $this->text(),
            'message' => $this->text(),

        ], $tableOptions);

        $this->createIndex('idx_log_level', $tableName, 'level');
        $this->createIndex('idx_log_category', $tableName, 'category');

    }

    public function safeDown()
    {
        $this->dropTable("{{%log_db_target}}");
    }
}

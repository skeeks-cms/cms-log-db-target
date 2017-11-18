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

        if ($this->db->driverName === 'mysql') {
            $this->alterColumn('{{%log_db_target}}', 'message', "longtext");
        } else {
            $this->alterColumn('{{%log_db_target}}', 'message', $this->text());
        }
        $this->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        echo "m160422_162718_alter_table__log_db_target cannot be reverted.\n";
        return false;
    }
}

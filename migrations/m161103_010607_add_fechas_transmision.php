<?php

use yii\db\Migration;

class m161103_010607_add_fechas_transmision extends Migration
{
    public function up()
    {
        $this->addColumn('transmision', 'inicio', $this->dateTime()->notNull());
        $this->addColumn('transmision', 'fin', $this->dateTime()->notNull());
    }

    public function down()
    {
        $this->dropColumn('transmision', 'inicio');
        $this->dropColumn('transmision', 'fin');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

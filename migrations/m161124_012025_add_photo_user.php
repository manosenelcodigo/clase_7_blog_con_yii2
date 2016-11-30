<?php

use yii\db\Migration;

class m161124_012025_add_photo_user extends Migration
{
    public function up()
    {
        $this->addColumn("user", "photo", "string");
    }

    public function down()
    {
        $this->dropColumn("user", "photo");
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

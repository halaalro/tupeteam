<?php

use yii\db\Migration;

/**
 * Class m240120_161627_create_fulltext_index_on_video
 */
class m240120_161627_create_fulltext_index_on_video extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
   $this->execute(sql:"ALTER TABLE {{%video}} ADD FULLTEXT(title, describtion, tags)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240120_161627_create_fulltext_index_on_video cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240120_161627_create_fulltext_index_on_video cannot be reverted.\n";

        return false;
    }
    */
}

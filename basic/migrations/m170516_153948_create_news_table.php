<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170516_153948_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->text(150)->notNull(),
            'text' => $this->text(1000)->notNull(),
            'image' => $this->string(),
            'date' => $this->date()->notNull(),
            'del_flag' => $this->boolean()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}

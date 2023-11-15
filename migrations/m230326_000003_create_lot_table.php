<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lot}}`.
 */
class m230326_000003_create_lot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lot}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'name' => $this->string(128)->notNull(),
            'description' => $this->string(512)->null(),
            'picture_path' => $this->string(128)->null(),
            'start_price' => $this->integer()->notNull(),
            'completion_date' => $this->date()->notNull(),
            'rate_step' => $this->integer()->unsigned()->notNull(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'category_id' => $this->integer()->unsigned()->notNull(),
        ]);

        // add foreign key for table 'user'
        $this->addForeignKey(
            'fk-lot-user_id',
            'lot',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // add foreign key for table 'category'
        $this->addForeignKey(
            'fk-lot-category_id',
            'lot',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lot}}');
    }
}

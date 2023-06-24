<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rate}}`.
 */
class m230326_000004_create_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rate}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'price' => $this->integer()->unsigned()->notNull(),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'lot_id' => $this->integer()->unsigned()->notNull(),
        ]);

        // add foreign key for table 'user'
        $this->addForeignKey(
            'fk-rate-user_id',
            'rate',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // add foreign key for table 'lot'
        $this->addForeignKey(
            'fk-rate-lot_id',
            'rate',
            'lot_id',
            'lot',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rate}}');
    }
}

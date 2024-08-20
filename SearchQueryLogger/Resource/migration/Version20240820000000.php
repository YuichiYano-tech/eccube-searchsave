<?php

namespace Plugin\SearchQueryLogger\Migration;

use Doctrine\DBAL\Schema\Schema;
use Eccube\Migration\AbstractMigration;

class Version20240820000000 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('dtb_search_query');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('search_date', 'datetime', ['notnull' => true]);
        $table->addColumn('search_keyword', 'string', ['length' => 255]);
        $table->addColumn('user_ip', 'string', ['length' => 255]);
        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('dtb_search_query');
    }
}

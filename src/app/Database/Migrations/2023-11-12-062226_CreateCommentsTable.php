<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'post_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'text' => [
				'type' => "TEXT",
			],
			'date' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('comments');
	}

	public function down()
	{
		$this->forge->dropTable('comments');
	}
}

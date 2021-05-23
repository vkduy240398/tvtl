<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Branch extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'parentid'=>[
				'type'=>'INT',
				'constraint'=>11
			],
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('branch');
	}

	public function down()
	{
		$this->forge->dropTable('branch');
	}
}

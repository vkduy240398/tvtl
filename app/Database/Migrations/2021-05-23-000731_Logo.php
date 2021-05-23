<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Logo extends Migration
{
	protected $DBGroup = 'default';
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'image'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('logo');
	}

	public function down()
	{
		$this->forge->dropTable('logo');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
			'fullname'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'username'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'password'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'email'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'address'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'avatar'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}

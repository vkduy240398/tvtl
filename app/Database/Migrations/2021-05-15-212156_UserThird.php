<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserThird extends Migration
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
			'id_role'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'fullname'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'id_age'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'phone'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'address'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'email'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'username'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'password'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'posi'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'gender'=>[
				'type'=>'VARCHAR',
				'constraint'=>10,
			],
			'ori'=>[
				'type'=>'VARCHAR',
				'constraint'=>10,
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('user_third');
	}

	public function down()
	{
		$this->forge->dropTable('user_third');
	}
}

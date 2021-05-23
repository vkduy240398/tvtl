<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
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
			'id_branch'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'title'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'image'=>[
				'type'=>'VARCHAR',
				'constraint'=> 255
			],
			'content'=>[
				'type'=>'LONGTEXT'	
			],
			'hot'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'publish'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('news');
	}

	public function down()
	{
		$this->forge->dropTable('news');
	}
}

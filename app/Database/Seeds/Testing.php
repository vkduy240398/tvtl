<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Testing extends Seeder
{	
	public function run()
	{	$seeder = \Config\Database::seeder();
		$model = model('TestingModels');

		$data = [
			'name' => 'darth',
			'email'    => 'darth@theempire.com',
		];
		$this->db->query("INSERT INTO testing (name, email) VALUES(:name:, :email:)", $data);
		$this->db->table('testing')->insert($data);
	}
}

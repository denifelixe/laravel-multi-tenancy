<?php 

namespace App\Repositories\Master\DBConnections\Repositories;

use App\Models\Master\DBConnections\DBConnectionsModel;
use App\Repositories\Master\DBConnections\DBConnectionsInterface;

class MySQLDBConnectionsRepository implements DBConnectionsInterface 
{
	protected $db_connections;

	public function __construct(DBConnectionsModel $db_connections)
	{
		$this->db_connections = $db_connections;
	}

	public function getAllConnectionsIdAndName(): array
	{
		return $this->db_connections->all()->pluck('connection_name', 'id')->all();
	}
}
<?php 

namespace App\Repositories\Master\DBConnections;

interface DBConnectionsInterface 
{
	public function getAllConnectionsIdAndName(): array;
}
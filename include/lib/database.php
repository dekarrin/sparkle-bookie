<?php

class Database
{
	private $conn;
	private $server;
	private $error = NULL;
	private $errno = NULL;
	private $prepared = array();
	private $log = array();
	
	public function __construct($server)
	{
		$this->server = $server;
	}
	
	public function connect($user, $pass, $database)
	{
		$this->conn = mysql_connect($this->server, $user, $pass);
		if ($this->conn === FALSE)
		{
			$this->set_errors();
			return FALSE;
		}
		if (!mysql_select_db($database, $this->conn))
		{
			$this->set_errors();
			return FALSE;
		}
		return TRUE;
	}
	
	public function get_log()
	{
		return $this->log;
	}
	
	public function query($query, $force_silent = False)
	{
		$this->log[] = $query;
		$result = mysql_query($query, $this->conn);
		if ($result === FALSE) {
			$this->set_errors();
			if (!$force_silent) {
				echo $this->get_error();
			}
			return NULL;
		}
		return $result;
	}
	
	// Does not actually prepare query; only stores it for later parsing
	public function prepare($name, $query)
	{
		$this->prepared[$name] = $query;
	}
	
	// only executes stored query; does not call any special procedure on server
	// Do not escape args before calling this function; they are escaped in this method.
	//
	// arguments after name are parameters to the statement
	public function execute($name)
	{
		$params = array_slice(func_get_args(), 1);
		if (!array_key_exists($name, $this->prepared)) {
			return FALSE;
		}
		$stmt = $this->prepared[$name];
		if (!is_null($params)) {
			for ($i = count($params); $i > 0; $i--) {
				$arg = $params[$i - 1];
				$arg = $this->escaped($arg);
				$stmt = str_replace('$' . $i, $arg, $stmt);
			}
		}
		$result = $this->query($stmt);
		return $result;
	}
	
	public function free_result($result) {
		mysql_free_result($result);
	}
	
	// arguments after stmt are arguments to the prepared statement
	public function prepared_select($stmt) {
		$params = func_get_args();
		$r = call_user_func_array(array(&$this, 'execute'), $params);
		$result = $this->get_result_array($r);
		$this->free_result($r);
		return $result;
	}
	
	/**
	 * Gets only a single value from the database. Always gets the first value
	 * of the first row.
	 *
	 * args after stmt are args to the prepared statement
	 */
	public function prepared_get($stmt) {
		$params = func_get_args();
		$table = call_user_func_array(array(&$this, 'prepared_select'), $params);
		$keys = array_keys($table[0]);
		return $table[0][$keys[0]];
	}
	
	public function select($table, $column, $check, $value, $limit = NULL)
	{
		$q = "SELECT $column FROM $table WHERE $check = '$value'";
		if (!is_null($limit)) {
			$q .= " LIMIT $limit";
		}
		$r = $this->get_result_array($this->query($q));
		if (!is_null($limit) && $limit == 1) {
			return $r[0][$column];
		} else {
			return $r;
		}
	}
	
	public function get_result_array($result)
	{
		$formatted = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$formatted[] = $row;
		}
		return $formatted;
	}
	
	public function get_insert_id() {
		return mysql_insert_id($this->conn);
	}
	
	public function get_affected()
	{
		return mysql_affected_rows($this->conn);
	}
	
	public function escaped($str)
	{
		return mysql_real_escape_string($str, $this->conn);
	}
	
	public function close()
	{
		return mysql_close($this->conn);
	}
	
	public function get_error()
	{
		return $this->error;
	}
	
	public function get_errno()
	{
		return $this->errno;
	}
	
	private function set_errors()
	{
		$this->error = mysql_error($this->conn);
		$this->errno = mysql_errno($this->conn);
	}
}

?>
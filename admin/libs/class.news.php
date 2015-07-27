<?php
	
	class News extends MySQLDatabase{
		protected static $table_name = TBL_NEWS;
		protected static $db_fields = array(
											 'newsid', 
											 'news_category',
											 'title',
											 'news_content',
											 'source',
											 'source_url',
											 'created_from',
											 'created_by',
											 'created_dt',
				                              'status' ,
											 'approved_by' ,
											 'approved_dt' ,
											 'updated_dt' ,
											 'updated_by'				
											);    
		public $newsid;
		public $news_category;
		public $title;
		public $news_content;
		public $source;
		public $source_url;
		public $created_from;
		public $created_by;
		public $created_dt;
		public $status;
		public $approved_by;
		public $approved_dt;
		public $updated_dt;
		public $updated_by;
		
		public $errors=array();
		
				
		public static function assignValues( $sql )
		{
		//this global function
			return self::find_by_sql( $sql );
		}
		
		public static function news_by_news( $news_id=0 )
		{
		/*
		* display jobs on left hand side
		*/
			global $database, $db;
			$select = " SELECT count(news.id) maxnum, news.id, news.newsName, job.newsIDFK ";
			$from 	= " FROM ".self::$table_name. " as news, ".TBL_JOB." AS job";
			$where 	= " WHERE  news.id = newsIDFK
							   AND job.createdAt >= NOW() - INTERVAL ".job_last_for." DAY
								AND job.isActive=1
								AND job.beenActive=1
								AND job.status=1 
								AND news.id <> {$news_id}
						";
			$group = " GROUP BY news.id";
			$order = " ORDER BY maxnum DESC"; 
			$limit = " LIMIT 0, ".max_news;
			
			$sql = $select. $from. $where.$group. $order. $limit;
			return self::find_by_sql( $sql );
		}
				
		/* public static function find_all_active($lang='english'){
			$lang = sqlInjectionCheck( $lang );
			$sql=" SELECT * FROM " .self::$table_name . " WHERE lang='{$lang}'";
			return self::find_by_sql( $sql );
		} */
		
		public function createnews()
		{
			if( empty($this->newsName) || strlen($this->newsName) <= 4 )
			{
				$this->errors[] = lang('error', 'news_required');
			}
			if( ! $this->check_avail())
			{
				$this->errors[] = "news name already exist.";
			}
			if( sizeof($this->errors) == 0)
			{
				if($this->create())
				{
					return true;
				}
			}
			return false;
		}
		private function check_avail()
		{
			/*
				* create new record in datbase
				*/
			global $database, $db;
			$attributes = $this->sanitised_attributes();
			$sel_qry="select id from ".self::$table_name."
					 where newsname like  '".$this->newsName."' ";
			$sel_result=$database->query($sel_qry);
			$cnt=$database->num_rows($sel_result);
			if($cnt == 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function updatenews()
		{
			if( empty($this->newsName) || strlen($this->newsName) <= 4 )
			{
				$this->errors[] = lang('error', 'news_required');
			}
				
			if( sizeof($this->errors) == 0)
			{
				if($this->update())
				{
					return true;
				}
			}
			return false;
		}
		
	/***********************************************************************/
		// Common Database Methods
		public static function find_all()
		{
		/*
		* find all records
		*/
			$sql=" SELECT * FROM " .self::$table_name. " ORDER BY id ASC ";
			return self::find_by_sql( $sql );
		}
		
		public static function find_all_active()
		{
			/*
				* find all records
				*/
			$sql=" SELECT * FROM " .self::$table_name. ""; // ORDER BY newsid ASC "
			//return self::find_by_sql( $sql );
			$result = self::find_by_sql( $sql );
			return !empty($result) ? array_shift($result) : false;
		}
		
		public static function find_by_id( $id=0 )
		{
		/*
		* find a single record by id
		*/
			global $database, $db;
			$sql = " SELECT * FROM ". self::$table_name;
			$sql .= " WHERE id= ".$db->escape_value($id);
			$sql .= " LIMIT 1 ";	
			$result = self::find_by_sql( $sql );
			return !empty($result) ? array_shift($result) : false;
		}
		
		public static function find_by_sql ( $sql="" )
		{
		/*
		* find records and but then into veriables
		*/
			global $database, $db;
			$result = $database->query( $sql );
			$object_array = array();
			while ($row = $database->fetch_array($result)) 
			{
				$object_array[] = self::instantiate($row);
			}
			return $object_array;
		}
		
		public static function count_all()
		{
		/*
		* count number records in a table
		*/
			global $database, $db;
			$sql = "SELECT COUNT(*) FROM ".self::$table_name;
			$result_set = $database->query($sql);
			$row = $database->fetch_array($result_set);
			return array_shift($row);
		}
		
		private static function instantiate($record) 
		{
		/*
		* put values into veriable
		*/
			$object = new self;
			foreach($record as $attribute=>$value)
			{
				if($object->has_attribute($attribute))
				{
					$object->$attribute = $value;
				}
			}
			return $object;
		}
		
		private function has_attribute($attribute)
		{
		/*
		* does veriable existed in array
		*/
			return array_key_exists($attribute, $this->attributes());
		}
		
		protected function attributes()
		{
		/*
		* check which veriables are in the array
		*/
			$attributes = array();
			foreach(self::$db_fields as $field)
			{
				if(property_exists($this, $field))
				{
					$attributes[$field] = $this->$field;
				}
			}
			return $attributes;
		}
		
		protected function sanitised_attributes()
		{
		/*
		* make input safer. escape values
		*/
			global $database, $db;
			$clean_attributes = array();
			foreach($this->attributes() as $key => $value)
			{
				if ( isset($value) && $value != "" )
				{
					$clean_attributes[$key] = $database->escape_value($value);
				}
			}
			return $clean_attributes;
		}
		
		private function create()
		{
		/*
		* create new record in datbase
		*/
			global $database, $db;
			$attributes = $this->sanitised_attributes();
			
				$sql = "INSERT INTO ".self::$table_name." (";
				$sql .= join(", ", array_keys($attributes));
				$sql .= ") VALUES ('";
				$sql .= join("', '", array_values($attributes));
				$sql .= "')";
				if($database->query($sql))
				{
					$this->id = $database->insert_id();
					return true;
				}
				else
				{
					return false;
				}
			
		}
		
		private function update()
		{
		/*
		* this function updates records in database
		*/
			global $database, $db;
			$attributes = $this->sanitised_attributes();
			$attribute_pairs = array();
			foreach($attributes as $key => $value)
			{
				if ( isset($value) && $value != "" )
				{
					$attribute_pairs[] = "{$key}='{$value}'";
				}
			}
			$sql = "UPDATE ".self::$table_name." SET ";
			$sql .= join(", ", $attribute_pairs);
			$sql .= " WHERE id=". $database->escape_value($this->id);
			$sql_select="select id from ".self::$table_name." where ";
			$database->query($sql);
			return ($database->affected_rows() == 1) ? true : false;
		}
		
		public function delete()
		{
		/*
		* this function delete a record using a id
		* @id
		*/
			global $database, $db;
			$sql = "DELETE FROM ".self::$table_name;
			$sql .= " WHERE id=". $database->escape_value($this->id);
			$sql .= " LIMIT 1";
			$database->query($sql);
			return ($database->affected_rows() == 1) ? true : false;
		}
	}
?>
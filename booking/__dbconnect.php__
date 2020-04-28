<?PHP
			//---------------------------------------------------------------------------------------------------------------
			// Global definitions for the backend database.
			//
			// Make sure that you have created the database found in 'mobilprog_mountains_db.sql'
			//
			// You *must* provide a DB_USER and DB_PASSWORD
			//---------------------------------------------------------------------------------------------------------------
			define("DB_USER","__ENTER_YOUR_DB_USER_HERE__");
			define("DB_PASSWORD","__ENTER_YOUR_DB_USER_PASSWORD_HERE__");

			define("DB_HOST","localhost");
			define("DB_NAME","MobilProg");
			
			$pdo=null;
			
			//---------------------------------------------------------------------------------------------------------------
			// endsWith - does string start with?
			//---------------------------------------------------------------------------------------------------------------

			function startsWith($haystack, $needle)
			{
			    return $needle === "" || strpos($haystack, $needle) === 0;
			}

			//---------------------------------------------------------------------------------------------------------------
			// endsWith - does string end with?
			//---------------------------------------------------------------------------------------------------------------

			function endsWith($haystack, $needle)
			{
			    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
			}

			//---------------------------------------------------------------------------------------------------------------
			// presenthtml - Allows us to pass national characters - & is replaced with %
			//---------------------------------------------------------------------------------------------------------------

			function presenthtml($str) {
					return str_replace("&","%",$str);
			}

			//---------------------------------------------------------------------------------------------------------------
			// getpost - Allows us to pass posts even if array position does not exist
			//---------------------------------------------------------------------------------------------------------------

			function getpost($param) {
					if(isset($_POST[$param])){
							$ret=$_POST[$param];
					}else{
							$ret="";			
					}
					return $ret;
			}
			
			//---------------------------------------------------------------------------------------------------------------
			// getpostAJAX - Allows us to pass posts even if array position does not exist
			//---------------------------------------------------------------------------------------------------------------

			function getpostAJAX($param) {
					if(isset($_POST[$param])){
							if($_POST[$param]==="0"){
									$ret="0";							
							}else if(empty($_POST[$param])){
									$ret="UNK";
							}else{
									$ret=htmlentities(urldecode($_POST[$param]));							
							}
					}else{
							$ret="UNK";
					}
					return $ret;
			}

			

			//---------------------------------------------------------------------------------------------------------------
			// cntparam - Counts number of booleans that are true
			//---------------------------------------------------------------------------------------------------------------

			function cntparam($p1,$p2,$p3,$p4) {
					$cnt=0;
					if($p1) $cnt++;
					if($p2) $cnt++;
					if($p3) $cnt++;
					if($p4) $cnt++;				
					return $cnt;
			}

			//---------------------------------------------------------------------------------------------------------------
			// err - Displays nicely formatted error and exits
			//---------------------------------------------------------------------------------------------------------------
			
			function err($errmsg) {
					header("HTTP/1.0 500 Internal server error:".$errmsg,true,500);
					echo $errmsg;
					exit;
			}
			
			//---------------------------------------------------------------------------------------------------------------
			// dbConnect - Makes database connection
			//---------------------------------------------------------------------------------------------------------------
						
			function dbConnect() {
				
				$printHeaderFunction=0;
				
				// send header info to err()?
				if ($printHeaderFunction) {
					$hdr = 'Database Connect Error';
				} else {
					$hdr = '';
				}

				global $pdo;
				try {
						$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST, DB_USER, DB_PASSWORD);
    				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);						
				} catch (PDOException $e) {
				    err("Error!: ".$e->getMessage()."<br/>");
				    die();
				}
							
			}

			dbConnect();
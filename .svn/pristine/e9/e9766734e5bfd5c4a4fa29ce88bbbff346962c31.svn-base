<?php

class DebuggerDumper {
	
	const TRUNCATE_LENGTH = 100;
	
	private $displayInfo = true;	
	
	/**
	* Dump information about a variable
	*
	* @param mixed $data,...
	* @access public
	* @static
	*/
	public static function dump($data, $name = '...', $caller = null) {

		// more arguments ?
		/*
		if (func_num_args() > 1) {
			$_ = func_get_args();
			foreach($_ as $d) {
				self::dump($d);
			}
			return;
		}
		*/
		
		// the content
		//
		?>
		<div class="engineDump-root">
			<ul class="engineDump-node engineDump-first">
				<?php echo self::_dump($data, $name);?>
				<?php if ($caller): ?>
					<li class="engineDump-footnote">				
						<span class="engineDump-call">
							Called from <code><?php echo $caller['file']?></code>,
							line <code><?php echo $caller['line']?></code>
						</span>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php
		
		// flee the hive
		//
		$_recursion_marker = self::_marker();
		if ($hive =& self::_hive($dummy)) {
			foreach($hive as $i=>$bee){
				if (is_object($bee)) {
					unset($hive[$i]->$_recursion_marker);
				} else {
					unset($hive[$i][$_recursion_marker]);
				}
			}
		}

		// PHP 4.x.x array reference bug...
		//
		if (is_array($data) && version_compare(PHP_VERSION, "5", "<")) {
			unset($GLOBALS[self::_marker()]); 
		}
	}
	
	/**
	* Dump information about a variable
	*
	* @param mixed $data
	* @param string $name
	* @access private
	* @static
	*/
	private static function _dump(&$data, $name='...') {

		// object ?
		//
		if (is_object($data)) {
			return self::_object($data, $name);
		}

		// array ?
		//
		if (is_array($data)) {

			// PHP 4.x.x array reference bug...
			//
			if (version_compare(PHP_VERSION, "5", "<")) {

				// prepare the GLOBAL reference list...
				//
				if (!isset($GLOBALS[self::_marker()])) {
					$GLOBALS[self::_marker()] = array();
				}
				if (!is_array($GLOBALS[self::_marker()])) {
					$GLOBALS[self::_marker()] = (array) $GLOBALS[self::_marker()];
				}
				
				// extract ?
				//
				if (!empty($GLOBALS[self::_marker()])) {
					$d = array_shift($GLOBALS[self::_marker()]);
					if (is_array($d)) {
						$data = $d;
					}
				}
			}

			return self::_array($data, $name);
		}

		// resource ?
		//
		if (is_resource($data)) {
			return self::_resource($data, $name);
		}
		
		// scalar ?
		//
		if (is_string($data)) {
			return self::_string($data, $name);
		}
		
		if (is_float($data)) {
			return self::_float($data, $name);
		}

		if (is_integer($data)) {
			return self::_integer($data, $name);
		}

		if (is_bool($data)) {
			return self::_boolean($data, $name);
		}
		
		// null ?
		//
		if (is_null($data)) {
			return self::_null($name);
		}
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for a NULL value
	*
	* @param string $name
	* @return string
	* @access private
	* @static
	*/
	private static function _null($name) {
	?>
	<li class="engineDump-child">
		<div class="engineDump-element">
			<span class="engineDump-name">[<?php echo $name;?>]</span>
			&nbsp;
			<strong class="engineDump-null">NULL</strong> 
			<em class="engineDump-type engineDump-null">(NULL)</em> 
		</div>
	</li>
	<?php
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 
	
	/**
	* Return the marked used to stain arrays
	* and objects in order to detect recursions
	*
	* @return string
	* @access private
	* @static
	*/
	private static function _marker() {
		
		static $_recursion_marker;
		if (!isset($_recursion_marker)) {
			$_recursion_marker = uniqid('krumo');
		}
		
		return $_recursion_marker;
	}
	
	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 
	
	/**
	* Adds a variable to the hive of arrays and objects which 
	* are tracked for whether they have recursive entries
	*
	* @param mixed &$bee either array or object, not a scallar vale
	* @return array all the bees
	*
	* @access private
	* @static
	*/
	private static function &_hive(&$bee) {
		
		static $_ = array();

		// new bee ?
		//
		if (!is_null($bee)) {
			
			// stain it
			//
			$_recursion_marker = self::_marker();
			if (is_object($bee)) {				
				isset($bee->$_recursion_marker) ? $bee->$_recursion_marker++ : $bee->$_recursion_marker = 1;
			} else {
				isset($bee[$_recursion_marker]) ? $bee[$_recursion_marker]++ : $bee[$_recursion_marker] = 1;
			}
			
			$_[0][] =& $bee;
		}

		// return all bees
		//
		return $_[0];
	}
	
	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for the properties of an array or object
	*
	* @param mixed &$data
	* @access private
	* @static
	*/
	private static function _vars(&$data) {

		$_is_object = is_object($data);
		// test for references in order to
		// prevent endless recursion loops
		//
		$_recursion_marker = self::_marker();
		
		
		if($_is_object) 
		{
			$_r = !isset($data->$_recursion_marker) ? 0 : $data->$_recursion_marker;
		}
		else 
		{
			$_r = !isset($data[$_recursion_marker]) ? 0 : $data[$_recursion_marker];
		}
		
		$_r = (integer) $_r;

		// recursion detected
		//
		if ($_r > 0) {
			return self::_recursion();
		}

		// stain it
		//
		self::_hive($data);

		// render it
		//
		?>
		<div class="engineDump-nest" style="display:none;">
			<ul class="engineDump-node">
		<?php

		// keys ?
		//
		$keys = ($_is_object)
			? array_keys(get_object_vars($data))
			: array_keys($data);
		
		// itterate 
		//
		foreach($keys as $k) {
	
			// skip marker
			//
			if ($k === $_recursion_marker) {
				continue;
			}
			
			// get real value
			//
			if ($_is_object) {
				$v =& $data->$k;
			} else {
				$v =& $data[$k];
			}
	
			self::_dump($v,$k);
		} 
		?>
			</ul>
		</div>
		<?php
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 
	
	/**
	* Render a block that detected recursion
	*
	* @access private
	* @static
	*/
	private static function _recursion() {
		?>
		<div class="engineDump-nest" style="display:none;">
			<ul class="engineDump-node">
				<li class="engineDump-child">
					<div class="engineDump-element"
							<span class="engineDump-name"><big>&#8734;</big></span>
							<em class="engineDump-type">(Recursion)</em> 
					</div>
				
				</li>
			</ul>
		</div>
		<?php
	}
	
	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for an array
	*
	* @param mixed $data
	* @param string $name
	* @access private
	* @static
	*/
	private static function _array(&$data, $name) {
		?>
		<li class="engineDump-child">
			
			<div class="engineDump-element <?php echo count($data) > 0 ? 'engineDump-expand' : '';?>">
				
					<a class="engineDump-name">[<?php echo $name;?>]</a>
					&nbsp;
					<strong class="engineDump-integer">></strong> 
					
					<?php
					// callback ?
					//
					if (is_callable($data)):
						$_ = array_values($data);
						?>
						<span class="engineDump-callback"> |
							<em class="engineDump-type">(Callback)</em>
							<strong class="engineDump-string"><?php
								echo htmlSpecialChars($_[0]);?>::<?php
								echo htmlSpecialChars($_[1]);?>();</strong></span>
					<?php
					endif;
					?>
						
					<em class="engineDump-type">(Array, <strong class="engineDump-array-length"><?php echo 
						(count($data)==1)
							?("1 element")
							:(count($data)." elements");
						?></strong>)</em> 
					
			</div>
		
			<?php if (count($data)) {
				self::_vars($data);
			} ?>
		</li>
		<?php
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for an object
	*
	* @param mixed $data
	* @param string $name
	* @access private
	* @static
	*/
	private static function _object(&$data, $name) {
		?>
		<li class="engineDump-child">
		
			<div class="engineDump-element <?php echo count($data) > 0 ? 'engineDump-expand' : '';?>">
					<a class="engineDump-name">[<?php echo $name;?>]</a>
					&nbsp;
					<em class="engineDump-type">(Object)</em> 
					<strong class="engineDump-class"><?php echo get_class($data);?></strong>
			</div>
		
			<?php if (count($data)) {
				self::_vars($data);
			} ?>
		</li>
		<?php
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for a resource
	*
	* @param mixed $data
	* @param string $name
	* @access private
	* @static
	*/
	private static function _resource($data, $name) {
		?>
		<li class="engineDump-child">
		
			<div class="engineDump-element">
				
					<span class="engineDump-name">[<?php echo $name;?>]</span>
					&nbsp;
					<strong class="engineDump-resource"><?php echo get_resource_type($data);?></strong>
					<em class="engineDump-type">(Resource)</em> 
			</div>
		
		</li>
		<?php
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for a boolean value
	*
	* @param mixed $data
	* @param string $name
	* @access private
	* @static
	*/
	private static function _boolean($data, $name) {
		?>
		<li class="engineDump-child">
		
			<div class="engineDump-element">
					<span class="engineDump-name">[<?php echo $name;?>]</span>
					&nbsp;
					<strong class="engineDump-boolean"><?php echo $data?'TRUE':'FALSE'?></strong>
					<em class="engineDump-type">(Boolean)</em> 
			</div>
		
		</li>
		<?php
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for a integer value
	*
	* @param mixed $data
	* @param string $name
	* @access private
	* @static
	*/
	private static function _integer($data, $name) {
		?>
		<li class="engineDump-child">
		
			<div class="engineDump-element">
				
					<span class="engineDump-name">[<?php echo $name;?>]</span>
					&nbsp;
					<strong class="engineDump-integer"><?php echo $data;?></strong> 
					<em class="engineDump-type">(Integer)</em>
			</div>
		
		</li>
		<?php
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for a float value
	*
	* @param mixed $data
	* @param string $name
	* @access private
	* @static
	*/
	private static function _float($data, $name) {
		?>
		<li class="engineDump-child">
		
			<div class="engineDump-element">
				
					<span class="engineDump-name">[<?php echo $name;?>]</span>
					&nbsp;
					<strong class="engineDump-float"><?php echo $data;?></strong>
					<em class="engineDump-type">(Float)</em> 
			</div>
		
		</li>
		<?php
	}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Render a dump for a string value
	*
	* @param mixed $data
	* @param string $name
	* @access private
	* @static
	*/
	private static function _string($data, $name) {

		// extra ?
		//
		$_extra = false;
		$_ = $data;
		if (strLen($data) > self::TRUNCATE_LENGTH) {
			$_ = substr($data, 0, self::TRUNCATE_LENGTH - 3) . '...';
			$_extra = true;
		}
		
		?>
		<li class="engineDump-child">
		
			<div class="engineDump-element <?php echo $_extra ? 'engineDump-expand' : '';?>">
					
					<<?php echo $_extra ? 'a' : 'span'?> class="engineDump-name">
						[<?php echo $name;?>]
					</<?php echo $_extra ? 'a' : 'span'?>>
					&nbsp;
					
					<strong class="engineDump-string"><?php echo htmlSpecialChars($_);?></strong>
					
					<?php
					// callback ?
					//
					if (is_callable($data)):
						?>
						<span class="engineDump-callback"> |
							<em class="engineDump-type">(Callback)</em>
							<strong class="engineDump-string"><?php echo htmlSpecialChars($_);?>();</strong></span>
						<?php
					endif;
					?>
					
					<em class="engineDump-type">(String,
						<strong class="engineDump-string-length"><?php
							echo strlen($data) ?> characters</strong> )</em>
			</div>
			
			<?php if ($_extra) { ?>
			<div class="engineDump-nest" style="display:none;">
				<ul class="engineDump-node">
					
					<li class="engineDump-child">
						<div class="engineDump-preview"><?php echo htmlSpecialChars($data);?></div>
					</li>
					
				</ul>
			</div>
			<?php } ?>
		</li>
		<?php
	}

}
?>
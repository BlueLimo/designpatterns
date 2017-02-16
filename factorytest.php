<?php
//factory design methos test
	class objectmath
	{
		private $objectlength;
		private $objectwidth;

		//constructor
		public function __construct($length, $width)
		{
			$this->objectlength = $length;
			$this->objectwidth = $width;
		}

		//function to calculate the area of the object
		public function getArea()
		{
			$objectarea= $this->objectlength * $this->objectwidth;
			$result = "The area of the object is: ";
			return $result . ' ' . $objectarea;
		}
	}
	class objectmathfactory
	{
		public static function definedimensions($length, $width)
		{
			return new objectmath($length, $width);
		}
	}

	//have the factory define the objectmath object and calculate the area
	$rect1 = objectmathfactory::definedimensions(10, 20);
	print_r($rect1->getArea());

?>
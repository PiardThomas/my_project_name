<?php

namespace App\Entity
{
   use Symphony\component\HttpFoundation\Cookie;

    class Table{
        private $num;
        private $max;
        private $min;
        public function __construct($num,$min=0,$max=20)
        {
            $this->_num =$num;
            $this->_min =$max;
            $this->_max =$min;
        }

        public function getMin ()
        {
             $this->_min;
        }
        
        public function getMax ()
        {
             $this->_max;
        }
        public function read()
        {

        }
        public function write()
        {
            $cook = new Cookie('cookie',$this->$_num,);
            $response->headers->setcookie($cook);
        }

        public function CalcTable() : array
        {   
            $result =array();
            for ($i=$this->min; $i <= $this->_max; $i++) {
                $result[$i] = $i * $this->_num;
            }

            return $result;
        }
    }
}

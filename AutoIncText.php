<?php
class AutoIncText
{
    private $start = 0;
    private $historia = array();
    private $prefix = "";
    private $arr = array();
    private $max_key_val = 0;
    private $first = 0;
    
    public function __construct($start_int = 7, $name_prefix = "TEXTO_", $texto_arr)
    {
        print "En el constructor AutoIncText\n";
        $this->start = $start_int;
        $this->first = $start_int;
        $this->prefix = $name_prefix;
        $this->arr = $texto_arr;
        $this->max_key_val = count($this->arr) + $this->first;
        
        $this->inicializar();
    }

    private function inicializar()
    {
        for ($i = 0; $i < count($this->arr); $i++) {
            $this->addVal($this->arr[$i]);
        }
    }

    public function textName()
    {
        $return_val = $this->prefix . strval($this->start);
        $this->start += 1;
        return $return_val;
    }

    public function addVal($val)
    {

        $new_val_arr = array($this->textName() => $val);
        $this->historia = array_merge($new_val_arr, $this->historia);
    }

    public function texto($name_of_val)
    {
        $find_index = intval(str_replace($this->prefix, "", $name_of_val));
        $is_in_range = ($this->max_key_val > $find_index) && ($find_index >= $this->first);
        
        if($is_in_range) {
            return $this->historia[$name_of_val];    
        }
        return "NOT VAL";
    }
    public function print_historia()
    {
        echo "HISTORIA:\n";

        print_r($this->historia);
    }
}

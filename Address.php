<?php

namespace Twisto;


class Address {
    /**
     * @var string
     */
    public $name;
    
    /**
     * @var string
     */
    public $street;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $zipcode;

    /**
     * @var string
     */
    public $country;
    
    /**
    * @var array
    */
    public $phones;

    public function __construct(array $data) {
        $this->name = $data['name'];
        $this->street = $data['street'];  
        $this->city = $data['city'];  
        $this->zipcode = $data['zipcode'];
        $this->country = isset($data['country']) ? $data['country'] : null;
        $this->phones = $data['phones']; 
    }
        
    public function serialize() {
        $data = array(
            'name' => $this->name,
            'street' => $this->street,
            'city' => $this->city, 
            'zipcode' => $this->zipcode,
            'phones' => array()
        );

        if ($this->country)
            $data['country'] = $this->country;
        
        if($this->phones) {
            foreach ($this->phones as $phone) {
                if ($phone != null && !in_array($phone, $data['phones']))
                    $data['phones'][] = $phone;
            }
        }
        
        return $data;
    }

}
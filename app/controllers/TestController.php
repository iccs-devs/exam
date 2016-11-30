<?php

class TestController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }  
    
    public function view()
    { 
        $parts = [
            ['id'  => '1', 'brand' => 'kingston', 'model' => 'kvr800'],
            ['id'  => '2', 'brand' => 'asus', 'model' => 'p5kpl-am-epu'],
            ['id'  => '3', 'brand' => 'seagate', 'model' => 'st23423432'],
            ['id'  => '123', 'brand' => 'a4tech', 'model' => 'hs100']
        ];
        
        
        $data = [
            'pcParts' => $parts,
            'stations' => ['station1'  => '101', 'station2' => '102', 'station3' => '103']
            
        ];
        
        return $this->theme->of('testView', $data)->render();
    }  

    

    

    
    

}

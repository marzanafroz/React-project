<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends BaseController
{
    protected $image;
    public function __construct()
    {
        $this->image = \Config\Services::image();
    }
    public function index()
    {
        echo WRITEPATH;
    }
    public function createthumb(){
// echo WRITEPATH;
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/0uWbJuWM3Gw.jpg')
    ->fit(100, 100, 'center')
    ->save(WRITEPATH.'/uploads/20230606/p/0uWbJuWM3Gw_thumb.jpg');
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/0uWbJuWM3Gw.jpg')
    ->fit(640, 480,'top-left')
    ->save(WRITEPATH.'/uploads/20230606/p/0uWbJuWM3Gw_medium.jpg');
    }

    public function pngtojpg(){
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/png.png')
    ->flatten(0, 255, 0)
    ->save(WRITEPATH.'/uploads/20230606/p/png-green.jpg');
    }

    public function flip(){
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/png.png')
    ->flip()
    ->save(WRITEPATH.'/uploads/20230606/p/flip-vertical.jpg');
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/png.png')
    ->flip("horizontal")
    ->save(WRITEPATH.'/uploads/20230606/p/flip-horizontal.jpg');
    }
    public function degree90(){
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/png.png')
    ->rotate(90)
    ->save(WRITEPATH.'/uploads/20230606/p/rotate90.jpg');
    }
    public function degree180(){
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/png.png')
    ->rotate(180)
    ->save(WRITEPATH.'/uploads/20230606/p/rotate180.jpg');
    }
    public function resize(){
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/lighthouse.jpg')
    ->resize(800,600,true,'width')
    ->save(WRITEPATH.'/uploads/20230606/p/lighthouse800x600.jpg');
    }
    public function textwatermark($text){
        $this->image->withFile(WRITEPATH.'/uploads/20230606/p/05.png')
        ->text($text, [
            'color'      => '#f00',
            'opacity'    => 0.01,
            // 'withShadow' => true,
            'hAlign'     => 'center',
            'vAlign'     => 'bottom',
            'fontSize'   => 5,
        ])
    ->save(WRITEPATH.'/uploads/20230606/p/textwatermark'.time().'.jpg');
    }
    public function logowatermark(){
    //     $this->image->withFile(WRITEPATH.'/uploads/20230606/p/05.png')
    // ->save(WRITEPATH.'/uploads/20230606/p/textwatermark'.time().'.jpg');
    $image = Image::make(WRITEPATH.'/uploads/20230606/p/png.png')->insert(WRITEPATH.'/uploads/logoci.png','center')->save(WRITEPATH.'/uploads/20230606/p/05_logo2.png');
    }
}

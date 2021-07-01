<?php

namespace Triangles;

trait Wrapper
{
    public function borderize($content)
    {
        return '<div style="border:2px solid black;" >' . $content . '</div>';
    }
}

interface I_Ball
{
    public function set($c, $s);
    public function make();
}

class Ball implements I_Ball
{
    private $color = 'black';
    private $size = 20;
    private $sizeText = '50px';

    private static $counter = 0;

    public function __construct($c = 'black', $s = 20)
    {
        $this->color = $c;
        $this->size = $s;
        $this->sizeText = $this->size . 'px';
    }

    public function set($c = 'black', $s = 20)
    {
        $this->color = $c;
        $this->size = $s;
        $this->sizeText = $this->size . 'px';
        return $this;
    }

    public function make()
    {
        Ball::addBallToCounter();
        $str =
            "<div style='margin-right:" .
            $this->size .
            "px;display:inline-block;background-color:$this->color;" .
            "width:$this->sizeText;height:$this->sizeText;border-radius:$this->sizeText;' ></div>";
        return $str;
    }

    public static function addBallToCounter()
    {
        Ball::$counter++;
    }

    public static function getCounter()
    {
        return Ball::$counter;
    }
}

interface I_Triangle
{
    public function create($c, $s, $limit);
}

abstract class Triangle implements I_Triangle
{
    protected $ball;

    public function __construct()
    {
        $this->ball = new Ball();
    }
}

class BottomLeftTriangle extends Triangle
{
    use Wrapper;

    public function __construct()
    {
        parent::__construct();
    }

    final public function create($c = 'black', $s = 20, $limit = 10)
    {
        $this->ball->set($c, $s);
        $str = '';
        for ($i = 0; $i < $limit; $i++) {
            for ($j = 0; $j < $i; $j++) {
                $str .= $this->ball->make();
            }
            $str .= '<br />';
        }
        $result =
            '<div style="line-height:' . $s * 2 . 'px;" >' . $str . '</div>';
        return $this->borderize($result);
    }
}
?>

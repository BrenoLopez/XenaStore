<?php
/**
 * Created by PhpStorm.
 * User: Greison
 * Date: 24/07/2018
 * Time: 10:35
 */

class Slides
{
    private $img1;
    private $img2;
    private $img3;
    function codSlide()
    {
        ?>
        
        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active"
                         style="background-image: url('<?= $this->getImg1(); ?>')">
                     </div>

                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item"
                         style="background-image: url(' <?= $this->getImg2();?>')">
                      </div>

                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item"
                         style="background-image: url('<?= $this->getImg3(); ?>')">

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>
        <?php
    }

    public function setImg1($img1)
{
    $this->img1 = $img1;
    return $this;
}
    public function getImg1()
{
    return $this->img1;
}

    public function setImg2($img2)
{
    $this->img2 = $img2;
    return $this;
}
    public function getImg2()
{
    return $this->img2;
}
    public function setImg3($img3)
{
    $this->img3 = $img3;
    return $this;
}
    public function getImg3()
{
    return $this->img3;
}
}
?>
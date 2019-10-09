<?php ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo $home_url; ?>images/canon_banner.jpg" alt="Canon" style="width:100%; height: 440px">
        </div>

        <div class="item">
            <img src="<?php echo $home_url; ?>images/nikon-banner.jpg" alt="Nikon" style="width:100%; height: 440px">
        </div>

        <div class="item">
            <img src="<?php echo $home_url; ?>images/OM-D-Banner.png" alt="Olympus" style="width:100%; height: 440px">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="sr-only">Next</span>
    </a>
</div>
<?php ?>
  <!--https://getbootstrap.com/docs/5.1/components/carousel/-->
  <!--carousel-->
  <div id="carouselCaptions" class="carousel slide" data-bs-ride="carousel">
    <!--carousel indicators at bottom of carousel-->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <!--inner carousel, holds carousel items-->
    <div class="carousel-inner">
      <!--active carousel item-->
      <div class="carousel-item active">
        <img src="../../assets/images/vases.png" class="d-block w-100" alt="vases">
        <!--carousel item caption-->
        <div class="carousel-caption d-block">
          <h3 class="text-dark pb-3 fw-bold">Unique and Creative Vase</h3>
          <a href="../details/index.php?itemid=1017" class="btn btn-dark">Shop Unique Vase</a>
        </div>
      </div>
      <!--carousel item-->
      <div class="carousel-item">
        <img src="../../assets/images/occulus.png" class="d-block w-100" alt="virtual reality headset">
        <!--carousel item caption-->
        <div class="carousel-caption d-block">
          <h3 class="text-dark pb-3 fw-bold">Virtual Reality Headset</h3>
          <a href="../details/index.php?itemid=1010" class="btn btn-dark">Shop VR Headset</a>
        </div>
      </div>
      <!--carousel item-->
      <div class="carousel-item">
        <img src="../../assets/images/shelf.png" class="d-block w-100" alt="shelf">
        <!--carousel item caption-->
        <div class="carousel-caption d-block">
          <h3 class="text-dark pb-3 fw-bold">Multiple Shelf Set</h3>
          <a href="../details/index.php?itemid=1015" class="btn btn-dark">Shop Shelf</a>
        </div>
      </div>
    </div>
    <!--carousel previous button-->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <!--carousel next button-->
    <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
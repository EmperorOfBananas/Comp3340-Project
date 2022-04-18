<!--https://getbootstrap.com/docs/5.1/components/navs-tabs/-->
<div class="container">
  <!--title-->
  <h2 class="text-center text-white bg-dark py-3">World Population</h2>
   <!--tablist-->
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <!---tab item-->
    <li class="nav-item" role="presentation">
      <button class="nav-link active btn btn-dark text-dark" id="year-2020-tab" data-bs-toggle="pill" data-bs-target="#year-2020" type="button" role="tab" aria-controls="year-2020" aria-selected="true">2020</button>
    </li>
    <!---tab item-->
    <li class="nav-item" role="presentation">
      <button class="nav-link btn btn-dark text-dark" id="year-2019-tab" data-bs-toggle="pill" data-bs-target="#year-2019" type="button" role="tab" aria-controls="year-2019" aria-selected="true">2019</button>
    </li>
    <!---tab item-->
    <li class="nav-item" role="presentation">
      <button class="nav-link btn btn-dark text-dark" id="year-2018-tab" data-bs-toggle="pill" data-bs-target="#year-2018" type="button" role="tab" aria-controls="year-2018" aria-selected="true">2018</button>
    </li>
    <!---tab item-->
    <li class="nav-item" role="presentation">
      <button class="nav-link btn btn-dark text-dark" id="year-2017-tab" data-bs-toggle="pill" data-bs-target="#year-2017" type="button" role="tab" aria-controls="year-2017" aria-selected="true">2017</button>
    </li>
    <!---tab item-->
    <li class="nav-item" role="presentation">
      <button class="nav-link btn btn-dark text-dark" id="year-2016-tab" data-bs-toggle="pill" data-bs-target="#year-2016" type="button" role="tab" aria-controls="year-2016" aria-selected="true">2016</button>
    </li>
    <!---tab item-->
    <li class="nav-item" role="presentation">
      <button class="nav-link btn btn-dark text-dark" id="year-2015-tab" data-bs-toggle="pill" data-bs-target="#year-2015" type="button" role="tab" aria-controls="year-2015" aria-selected="true">2015</button>
    </li>
    <!---tab item-->
    <li class="nav-item" role="presentation">
      <button class="nav-link btn btn-dark text-dark" id="year-2014-tab" data-bs-toggle="pill" data-bs-target="#year-2014" type="button" role="tab" aria-controls="year-2014" aria-selected="true">2014</button>
    </li>
    <!---tab item-->
    <li class="nav-item" role="presentation">
      <button class="nav-link btn btn-dark text-dark" id="year-2013-tab" data-bs-toggle="pill" data-bs-target="#year-2013" type="button" role="tab" aria-controls="year-2013" aria-selected="true">2013</button>
    </li>
  </ul>
   <!--tab content for each tab item-->
  <div class="tab-content" id="pills-tabContent">
    <!--tab-->
    <div class="tab-pane fade show active" id="year-2020" role="tabpanel" aria-labelledby="year-2020-tab">
      <!--table-->
      <table class="table">
        <!--table heading-->
        <thead>
          <tr>
            <th scope="col">Country</th>
            <th scope="col">Code</th>
            <th scope="col">Population</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!--tab-->
    <div class="tab-pane fade" id="year-2019" role="tabpanel" aria-labelledby="year-2019-tab">
      <!--table-->
      <table class="table">
        <!--table heading-->
        <thead>
          <tr>
            <th scope="col">Country</th>
            <th scope="col">Code</th>
            <th scope="col">Population</th>    
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!--tab-->
    <div class="tab-pane fade" id="year-2018" role="tabpanel" aria-labelledby="year-2018-tab">
      <!--table-->
      <table class="table">
        <!--table heading-->
        <thead>
          <tr>
            <th scope="col">Country</th>
            <th scope="col">Code</th>
            <th scope="col">Population</th>    
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!--tab-->
    <div class="tab-pane fade" id="year-2017" role="tabpanel" aria-labelledby="year-2017-tab">
      <!--table-->
      <table class="table">
        <!--table heading-->
        <thead>
          <tr>
            <th scope="col">Country</th>
            <th scope="col">Code</th>
            <th scope="col">Population</th>    
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!--tab-->
    <div class="tab-pane fade" id="year-2016" role="tabpanel" aria-labelledby="year-2016-tab">
      <!--table-->
      <table class="table">
        <!--table heading-->
        <thead>
          <tr>
            <th scope="col">Country</th>
            <th scope="col">Code</th>
            <th scope="col">Population</th>    
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!--tab-->
    <div class="tab-pane fade" id="year-2015" role="tabpanel" aria-labelledby="year-2015-tab">
      <!--table-->
      <table class="table">
        <!--table heading-->
        <thead>
          <tr>
            <th>Country</th>
            <th scope="col">Code</th>
            <th scope="col">Population</th>    
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!--tab-->
    <div class="tab-pane fade" id="year-2014" role="tabpanel" aria-labelledby="year-2014-tab">
      <!--table-->
      <table class="table">
        <!--table heading-->
        <thead>
          <tr>
            <th scope="col">Country</th>
            <th scope="col">Code</th>
            <th scope="col">Population</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!--tab-->
    <div class="tab-pane fade" id="year-2013" role="tabpanel" aria-labelledby="year-2013-tab">
      <!--table-->
      <table class="table">
        <!--table heading-->
        <thead>
          <tr>
            <th scope="col">Country</th>
            <th scope="col">Code</th>
            <th scope="col">Population</th>    
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
  <div class="d-flex flex-column">
    <span> Attribution: </span>
    <span>The World Bank: Population, total: World Development Indicators</span>
    <span>id: SP.POP.TOTL</span>
    <span>Terms: <a href="https://www.worldbank.org/en/about/legal/terms-of-use-for-datasets"> https://www.worldbank.org/en/about/legal/terms-of-use-for-datasets</a></span>
  </div>
</div>
<script src="../../JS/population.js"></script>
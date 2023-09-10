<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">{{ 'Dashboard' }} | <small>Statistics</small></h1>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$sap_connectors_count ?? ''}}</h3>
          <p><b>Connectors</b></p>
        </div>
        <div class="icon">
          <i class="fas fa-network-wired"></i>
        </div>
        <a href="{!! url('/sap_connectors'); !!}" class="small-box-footer">View Connectors <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$sap_financial_systems_count ?? ''}}<sup style="font-size: 20px"><!--%--></sup></h3>

          <p><b>SAP Systems</b></p>
        </div>
        <div class="icon">
          <i class="fas fa-cogs"></i>
        </div>
        <a href="{!! url('/sap_financial_systems'); !!}" class="small-box-footer">View Systems <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$sap_financial_services_count ?? ''}}</h3>

          <p><b>Financial Services</b></p>
        </div>
        <div class="icon">
          <i class="bi bi-stack"></i>
        </div>
        <a href="{!! url('/sap_financial_services'); !!}" class="small-box-footer">View Services <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>0</h3>

          <p><b>Suspended Services</b></p>
        </div>
        <div class="icon">
          <i class="bi bi-plug"></i>
        </div>
        <a href="#" class="small-box-footer">View Services <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
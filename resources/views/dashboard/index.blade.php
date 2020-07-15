@extends('layouts.adminmain')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="section-body">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Fasilitas</h4>
                  </div>
                  <div class="card-body">
                    {{$fasilitas}}
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Layanan</h4>
                  </div>
                  <div class="card-body">
                    {{$layanan}}
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-gift"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Product</h4>
                  </div>
                  <div class="card-body">
                    {{$product}}
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Customer</h4>
                  </div>
                  <div class="card-body">
                    {{$cust}}
                  </div>
                </div>
              </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
              <div class="card-header">
                <h4>{{ $chart1->options['chart_title'] }}</h4>
              </div>
          <div class="card-body p-0">
            {!! $chart1->renderHtml() !!}
          </div>
      </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-calculator"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Order</h4>
                  </div>
                  <div class="card-body">
                    {{$order}}
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                  <i class="fas fa-laptop"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Antrian</h4>
                  </div>
                  <div class="card-body">
                    {{$ant}}
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection()
@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection
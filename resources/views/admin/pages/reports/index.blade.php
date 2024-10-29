@extends('admin.master')
@section('content')
<div class="card-heading py-3">
  <div class="container">
    <div class="heading-title text-white text-center mx-auto mb-3">
      {{$title}}
    </div>
    <div class="heading-detail text-white text-center mb-3">
      {{$details}}
    </div>
  </div>
</div>
<div class="card-content">
  <div class="container-fluid mx-0 ps-0">
    <div class="row">
      <div class="col-lg-2">
        @include('admin.pages._sidebar')
      </div>
      <div class="bg-white col-lg-10 pt-2">
        <div id="mixed-chart"></div>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  // Dữ liệu báo cáo từ Laravel
  document.addEventListener('DOMContentLoaded', function () {
    const reports = @json($reports);

    const options = {
      chart: {
        height: 350,
        type: 'line',
      },
      series: [
        {
          name: 'Mức độ nước',
          type: 'column',
          data: reports.map(report => report.water_level)
        },
        {
          name: 'Số lượng nước',
          type: 'line',
          data: reports.map(report => report.water_quality)
        },
        {
          name: 'Nước sử dụng',
          type: 'column',
          data: reports.map(report => report.water_usage)
        }
      ],
      xaxis: {
        categories: reports.map(report => report.month),
      },
      yaxis: [
        {
          title: {
            text: 'Mức độ nước và lượng sử dụng'
          },
        },
        {
          title: {
            text: 'Số lượng nước'
          },
          opposite: true
        }
      ],
    };

    // Kiểm tra phần tử trước khi vẽ
    const chartElement = document.querySelector("#mixed-chart");
    if (chartElement) {
      const chart = new ApexCharts(chartElement, options);
      chart.render();
    } else {
      console.error("Element not found");
    }
  });
</script>
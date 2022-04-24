@extends('layouts.app')

@push('styles')
<script>
    if (!localStorage.getItem('token')) {
        window.location.replace("{{route('login')}}");
    }
</script>
<script src="{{asset('js/chart.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

<style>
    .card {
        /* background: hsl(216, 100%, 14%); */
        border-radius: 15px;
        width: 18rem;
        text-align: center;
        margin: 2px 20px;
        height: 15rem;
    }

    .card-header {
        font-size: 18px;
    }

    .chart-container {
        display: flex;
    }

    #chart-left {
        max-width: 30vw;
        max-height: 50vh;
    }

    #chart-right {
        max-width: 30vw;
        max-height: 50vh;
    }

    @media screen and (max-width: 1000px) {
        #chart-left {
            max-width: 100vw;
        }

        #chart-right {
            max-width: 100vw;
        }
    }
</style>
@endpush

@section('content')
<!-- End Bagian Atas Navigation -->

<!-- Load sidebar component -->
<x-sidebar/>

<!-- Isi Konten Dashboard -->

<main class="">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h2>Dashboard</h2>
        </div>
    </div>
    <section class="d-flex my-4 flex-column flex-sm-row align-items-center align-items-sm-stretch">
        <div class="d-flex card mb-3 shadow-lg" style="max-width: 18rem;">
            <div class="card-header text-center">
                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                Omset
            </div>
            <div class="card-body row align-items-center">
                <h2 class="card-title font-weight-bold">10000 IDR</h2>
            </div>
        </div>
        <div class="d-flex card mb-3 shadow-lg" style="max-width: 18rem;">
            <div class="card-header text-center">
                <i class="fa-solid fa-dollar-sign"></i>
                Keuntungan
            </div>
            <div class="card-body row align-items-center">
                <h2 class="card-title font-weight-bold">10000 IDR</h2>
            </div>
        </div>
        <div class="d-flex card mb-3 shadow-lg" style="max-width: 18rem;">
            <div class="card-header text-center">
                <i class="fa-solid fa-circle-check"></i>
                Jumlah Penjualan
            </div>
            <div class="card-body row align-items-center">
                <h2 class="card-title font-weight-bold">10000</h2>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12 mt-5">
            <h2>Grafik Penjualan</h2>
        </div>
    </div>
    <div class="chart-container d-flex flex-column flex-lg-row mb-5">
        <canvas id="chart-left" width="400" height="400"></canvas>
        <canvas id="chart-right" width="400" height="400"></canvas>
    </div>
</main>

<!-- Start chart -->

@endsection


@push('scripts')
<script>
    const ctx1 = document.getElementById('chart-left');
    const ctx2 = document.getElementById('chart-right');
    Chart.Chart.register(...Chart.registerables);


    const myChart1 = new Chart.Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const myChart2 = new Chart.Chart(ctx2, {
        type: 'polarArea',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
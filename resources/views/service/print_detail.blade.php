<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Lab Perancangan Mesin @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

  <style>
    body{
        margin: 0;
        padding: 0;
        position: relative;
        left: 0;
        right: 0;
        top: 0;
    }
    .page{
        margin: 0;
        padding: 0;
        position: relative;
        display: block;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
    }
    .page-header h1{
        font-weight: 700;
        text-transform: uppercase;
        font-size: 16px;
        margin: 20px 10px;
        padding: 0;
        text-align: center;
    }
    .table-bordered{
        border: 1px solid #333;
    }
    .table th{
        padding: 5px 10px !important;
    }
    .table td{
        padding: 5px 10px !important;
    }
    .table-bordered,tr,th{
        border: 1px solid #333 !important;
    }
    .table-bordered,tr,td{
        border: 1px solid #333 !important;
    }
    .row{
        display:-ms-flexbox;
        display:flex;
        -ms-flex-wrap:wrap;
        flex-wrap:wrap;
        margin-right:-15px;
        margin-left:-15px
    }
    .col-md-12{
        position:relative;
        width:100%;
        padding-right:15px;
        padding-left:15px
    }
    .col-md-12{
        -ms-flex:0 0 100%;
        flex:0 0 100%;
        max-width:100%
    }
    .text-center{
        text-align:center!important
    }
        .table-responsive{
            display:block;
            width:100%;
            overflow-x:auto;
            -webkit-overflow-scrolling:touch
        }
        .table-responsive>.table-bordered{
            border:0
        }
        .table{
            width: 680px !important;
        }
        .ty{
            border-top-width: 1px !Important;
            background-color: #2a5788 !important;
            color: #fff !important;
            text-transform: uppercase;
            text-align: center;
            font-weight: 700;
            font-size: 1.063rem;
        }
        .text-red{
            font-weight: 700;
            color: red;
        }
    </style>

</head>

<body class=""> 
    <section class="page">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header text-center">
                    <h1>Detail Service Kode {{ $perawatans->kode_service }}</h1>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center ty">{{ $perawatans->alat->nama_alat }} {{ $perawatans->alat->lokasi }}</td>
                        </tr>
                        <tr>
                            <td>Kode Service</td>
                            <td class="text-red">{{ $perawatans->kode_service }}</td>
                        </tr>
                        <tr>
                              <td>Tanggal</td>
                              <td class="text-red">{{ $perawatans->tanggal }}</td>
                        </tr>
                        <tr>
                            <td>Vendor</td>
                            <td>{{ $perawatans->vendor }}</td>
                        </tr>
                        <tr>
                            <td>Kerusakan</td>
                            <td>{{ $perawatans->kerusakan }}</td>
                        </tr>
                        <tr>
                            <td>Part yang diganti</td>
                            <td>{{ $perawatans->part }}</td>
                        </tr>
                        <tr>
                            <td>Biaya</td>
                            <td>Rp. {{ $perawatans->biaya }}</td>
                        </tr>
                        <tr>
                            <td>Sumber Dana</td>
                            <td>{{ $perawatans->sumber_dana }}</td>
                        </tr>
                    </tbody>
              </table>
        </div>
    </section>
</body>

</html>

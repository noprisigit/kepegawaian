      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $subtitle; ?></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                                <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Filter Berdasarkan</label>
                                                    <select name="filter" id="filter" class="form-control">
                                                        <option selected disabled>- Filter -</option>
                                                        <option value="1">Tanggal, Bulan, Tahun</option>
                                                        <option value="2">Nama</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card" id="base_tanggal" style="display: none;">
                                <div class="card-body">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Tanggal</label>
                                                    <select name="tgl" id="tgl" class="form-control" required>
                                                        <option selected disabled>- Pilih Tanggal -</option>
                                                        <?php for($i = 1; $i <= 31; $i++) : ?>
                                                            <?php if($i < 10) : ?>
                                                                <option value="0<?= $i; ?>">0<?= $i; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Bulan</label>
                                                    <select name="bln" id="bln" class="form-control" required>
                                                        <option selected disabled>- Pilih Bulan -</option>
                                                        <option value="01">Januari</option>
                                                        <option value="02">Februari</option>
                                                        <option value="03">Maret</option>
                                                        <option value="04">April</option>
                                                        <option value="05">Mei</option>
                                                        <option value="06">Juni</option>
                                                        <option value="07">Juli</option>
                                                        <option value="08">Agustus</option>
                                                        <option value="09">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Tahun</label>
                                                    <select name="thn" id="thn" class="form-control" required>
                                                        <option selected disabled>- Pilih Tahun -</option>
                                                        <option value="2020">2020</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary float-right" id="filter_date">Filter</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card" id="base_nama" style="display: none;">
                                <div class="card-body">
                                    <div class="row">                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <select id="filter_nama_pegawai" class="form-control select2bs4">
                                                    <option selected disabled>- Pilih Nama -</option>
                                                    <?php foreach ($pegawai as $item) : ?>
                                                        <option value="<?= $item['id_pegawai']; ?>"><?= $item['nama_pegawai']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-primary float-right" id="filter_name">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="card_rekap_tanggal" style="display: none">
                                <div class="card-body" >
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rekap Absensi Berdasarkan Tanggal</h3>

                                            <!-- <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Nama Pegawai</th>
                                                        <th class="text-center">Status Absensi</th>
                                                        <th class="text-center">Keterangan</th>
                                                        <th class="text-center">Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="hasil_rekap_tanggal">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>  
                                </div>
                            </div>
                            <div class="card" id="card_rekap_nama" style="display: none">
                                <div class="card-body" >
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rekap Absensi Berdasarkan Nama</h3>

                                            <!-- <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Nama Pegawai</th>
                                                        <th class="text-center">Status Absensi</th>
                                                        <th class="text-center">Keterangan</th>
                                                        <th class="text-center">Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="hasil_rekap_nama">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

      
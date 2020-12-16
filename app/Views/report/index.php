<?= view('templates/header'); ?>
<?= view('templates/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List Report
                            <a href="<?= base_url('purchase/create'); ?>" class="btn btn-primary float-right">Tambah</a>
                        </div>
                        <div class="card-body">

                            <?php if(!empty(session()->getFlashdata('success'))): ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success'); ?>
                                </div>
                            <?php endif;?>
                            <?php if(!empty(session()->getFlashdata('info'))): ?>
                                <div class="alert alert-info">
                                    <?= session()->getFlashdata('info'); ?>
                                </div>
                            <?php endif;?>
                            <?php if(!empty(session()->getFlashdata('warning'))): ?>
                                <div class="alert alert-warning">
                                    <?= session()->getFlashdata('warning'); ?>
                                </div>
                            <?php endif;?>

                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= view('templates/footer'); ?>
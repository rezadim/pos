<?= view('templates/header'); ?>
<?= view('templates/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Purchases</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Purchases</li>
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
                            List Purchases
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

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <th width="10px" class="text-center">#</th>
                                        <th>Purchase Id</th>
                                        <th>Supplier</th>
                                        <th>Total Purchase</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php $no=0; foreach($purchases as $key => $row):?>
                                        <tr>
                                            <td class="text-center"><?= ++$no; ?></td>
                                            <td><?= $row['trx_purchase_id']; ?></td>
                                            <td><?= $row['supplier_name']; ?></td>
                                            <td><?= "Rp.".number_format($row['total_purchase']); ?></td>
                                            <td><?= $row['purchase_created_at']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('purchase/show/'.$row['trx_purchase_id']); ?>" class="btn btn-sm btn-info">
                                                    <li class="fa fa-eye"></li>
                                                </a>
                                                <a href="<?= base_url('purchase/edit/'.$row['trx_purchase_id']); ?>" class="btn btn-sm btn-success">
                                                    <li class="fa fa-edit"></li>
                                                </a>
                                                <a href="<?= base_url('purchase/delete/'.$row['trx_purchase_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin???');">
                                                    <li class="fa fa-trash-alt"></li>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= view('templates/footer'); ?>
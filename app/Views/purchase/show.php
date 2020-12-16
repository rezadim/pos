<?= view('templates/header'); ?>
<?= view('templates/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Purchase</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Purchases</a>
                        </li>
                        <li class="breadcrumb-item active">Detail Purchase</li>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <th>Purchase Id</th>
                                        <th>Supplier</th>
                                        <th>Total Purchase</th>
                                        <th>Created At</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $purchase['trx_purchase_id']; ?></td>
                                            <td><?= $purchase['supplier_name']; ?></td>
                                            <td><?= "Rp.".number_format($purchase['total_purchase']); ?></td>
                                            <td><?= $purchase['purchase_created_at']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Produk Pembelian
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createPesanan">
                                Tambah Pembelian
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            
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

                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <th width="10px" class="text-center">#</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <input type="hidden" name="trx_purchase_id" value="<?= $purchase['trx_purchase_id']; ?>">
                                        <?php $no=0; foreach($purchaseDetail as $key=>$row): ?>
                                        <tr>
                                            <td class="text-center"><?= ++$no; ?></td>
                                            <td><?= $row['product_name']; ?></td>
                                            <td><?= $row['purchase_quantity']; ?></td>
                                            <td><?= "Rp.".number_format($row['purchase_price']); ?></td>
                                            <td><?= $row['purchase_subtotal']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('purchase/edit/'.$row['purchase_detail_id']); ?>" class="btn btn-sm btn-success">
                                                    <li class="fa fa-edit"></li>
                                                </a>
                                                <a href="<?= base_url('purchase/deletePurchase/'.$row['purchase_detail_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin???');">
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


<!-- Modal -->
<div class="modal fade" id="createPesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('purchase/storePurchase'); ?>" method="post">
            <input type="hidden" name="trx_purchase_id" value="<?= $purchase['trx_purchase_id']; ?>">
            <div class="form-group">
                <label>Product</label>
                <select name="product_id" class="form-control">
                    <?php foreach($products as $p): ?>
                    <option value="<?= $p['product_id']; ?>"><?= $p['product_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="purchase_quantity" class="form-control">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="purchase_price" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary float-right">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
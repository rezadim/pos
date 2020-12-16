<?= view('templates/header'); ?>
<?= view('templates/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Suppliers</a>
                        </li>
                        <li class="breadcrumb-item active">Add Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $errors = session()->getFlashdata('errors');
                    ?>
                    <?php if(!empty($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach($errors as $error): ?>
                            <li><?= esc($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form action="<?= base_url('supplier/store')?>" method="post">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Supplier Name</label>
                                        <input type="text" name="supplier_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number" name="supplier_phone_number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="supplier_address" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="<?= base_url('supplier'); ?>" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    <?= view('templates/footer'); ?>
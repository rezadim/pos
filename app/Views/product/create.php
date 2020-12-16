<?= view('templates/header'); ?>
<?= view('templates/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Products</a>
                        </li>
                        <li class="breadcrumb-item active">Add Product</li>
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

                    <form action="<?= base_url('product/store')?>" method="post">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                        <label>Product Code</label>
                                        <input type="text" name="product_code" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="sale_price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="number" name="stock" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <input type="text" name="product_description" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="<?= base_url('product'); ?>" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    <?= view('templates/footer'); ?>
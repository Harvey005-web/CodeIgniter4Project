<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $account ? 'Edit' : 'Add' ?> Customer Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php $errors = session()->getFlashdata('errors') ?? []; ?>
    <main class="container py-4" style="max-width: 800px;">
        <h1 class="h3 mb-4"><?= $account ? 'Edit' : 'Add' ?> Customer Account</h1>
        <?php if ($errors !== []): ?><div class="alert alert-danger"><ul class="mb-0"><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
        <form method="post" action="<?= base_url($action) ?>" class="card shadow-sm"><div class="card-body">
            <?= csrf_field() ?>
            <?php $value = static fn(string $key) => esc(old($key, $account[$key] ?? '')); ?>
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Account Number</label><input class="form-control" name="account_number" value="<?= $value('account_number') ?>" required></div>
                <div class="col-md-6"><label class="form-label">Customer Name</label><input class="form-control" name="customer_name" value="<?= $value('customer_name') ?>" required></div>
                <div class="col-12"><label class="form-label">Address</label><textarea class="form-control" name="address" required><?= $value('address') ?></textarea></div>
                <div class="col-md-6"><label class="form-label">Phone</label><input class="form-control" name="phone" value="<?= $value('phone') ?>"></div>
                <div class="col-md-6"><label class="form-label">Email</label><input class="form-control" name="email" type="email" value="<?= $value('email') ?>"></div>
                <div class="col-md-4"><label class="form-label">Meter Number</label><input class="form-control" name="meter_number" value="<?= $value('meter_number') ?>"></div>
                <div class="col-md-4"><label class="form-label">Connection Type</label><select class="form-select" name="connection_type"><option value="residential" <?= $value('connection_type') === 'residential' ? 'selected' : '' ?>>Residential</option><option value="commercial" <?= $value('connection_type') === 'commercial' ? 'selected' : '' ?>>Commercial</option><option value="industrial" <?= $value('connection_type') === 'industrial' ? 'selected' : '' ?>>Industrial</option></select></div>
                <div class="col-md-4"><label class="form-label">Status</label><select class="form-select" name="status"><option value="active" <?= $value('status') === 'active' ? 'selected' : '' ?>>Active</option><option value="inactive" <?= $value('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option><option value="suspended" <?= $value('status') === 'suspended' ? 'selected' : '' ?>>Suspended</option></select></div>
            </div>
            <div class="mt-4"><button class="btn btn-primary" type="submit">Save</button><a class="btn btn-secondary" href="<?= base_url('dashboard') ?>">Cancel</a></div>
        </div></form>
    </main>
</body>
</html>

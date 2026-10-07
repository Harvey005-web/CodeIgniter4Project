<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Customer Accounts</h1>
            <div>
                <a class="btn btn-primary" href="<?= base_url('accounts/create') ?>">Add Account</a>
                <form class="d-inline" method="post" action="<?= base_url('logout') ?>">
                    <?= csrf_field() ?>
                    <button class="btn btn-outline-secondary" type="submit">Logout</button>
                </form>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead><tr><th>Account No.</th><th>Customer</th><th>Email</th><th>Phone</th><th>Type</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                    <?php foreach ($accounts as $account): ?>
                        <tr>
                            <td><?= esc($account['account_number']) ?></td>
                            <td><?= esc($account['customer_name']) ?></td>
                            <td><?= esc($account['email']) ?></td>
                            <td><?= esc($account['phone']) ?></td>
                            <td><?= esc(ucfirst($account['connection_type'])) ?></td>
                            <td><?= esc(ucfirst($account['status'])) ?></td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-outline-primary" href="<?= base_url('accounts/' . $account['id'] . '/edit') ?>">Edit</a>
                                <form class="d-inline" method="post" action="<?= base_url('accounts/' . $account['id'] . '/delete') ?>">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($accounts === []): ?><tr><td class="text-center" colspan="7">No accounts found.</td></tr><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>

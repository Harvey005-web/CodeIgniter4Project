<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root { --primary-color: #1e40af; --secondary-color: #f59e0b; --dark-color: #1f2937; }
        body { background: #f8fafc; color: var(--dark-color); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .dashboard-nav { background: #fff; }
        .brand { color: var(--primary-color); font-size: 1.3rem; font-weight: 700; text-decoration: none; }
        .brand i, .text-accent { color: var(--secondary-color); }
        .dashboard-hero { background: linear-gradient(135deg, var(--primary-color), var(--dark-color)); color: #fff; padding: 2.5rem 0 4.5rem; }
        .dashboard-content { margin-top: 2.5rem; }
        .dashboard-card { border: 0; border-radius: 1rem; box-shadow: 0 .8rem 2rem rgba(31, 41, 55, .12); overflow: hidden; }
        .stat-card { border: 0; border-radius: .8rem; box-shadow: 0 .3rem 1rem rgba(31, 41, 55, .09); }
        .stat-icon { width: 46px; height: 46px; border-radius: 50%; display: grid; place-items: center; background: #eff6ff; color: var(--primary-color); }
        .btn-primary { background: var(--secondary-color); border-color: var(--secondary-color); border-radius: 25px; font-weight: 600; }
        .btn-primary:hover { background: #d97706; border-color: #d97706; }
        .table thead th { background: #eff6ff; color: var(--primary-color); font-size: .78rem; letter-spacing: .04em; text-transform: uppercase; white-space: nowrap; }
        .table > :not(caption) > * > * { padding: 1rem; vertical-align: middle; }
        .status-badge { border-radius: 20px; font-size: .75rem; font-weight: 600; padding: .4rem .65rem; }
        .status-active { background: #dcfce7; color: #166534; }
        .status-inactive { background: #fef3c7; color: #92400e; }
        .status-suspended { background: #fee2e2; color: #991b1b; }
        .empty-state { padding: 3.5rem 1rem; color: #6b7280; }
        .empty-state i { color: var(--secondary-color); font-size: 2.5rem; }
    </style>
</head>
<body>
    <?php $activeAccounts = count(array_filter($accounts, static fn ($account) => $account['status'] === 'active')); ?>
    <nav class="dashboard-nav navbar shadow-sm">
        <div class="container">
            <a class="brand" href="<?= base_url() ?>"><i class="fas fa-bolt me-2"></i>Puihaha Electric</a>
            <form method="post" action="<?= base_url('logout') ?>">
                <?= csrf_field() ?>
                <button class="btn btn-outline-secondary btn-sm" type="submit"><i class="fas fa-right-from-bracket me-1"></i>Logout</button>
            </form>
        </div>
    </nav>
    <section class="dashboard-hero">
        <div class="container">
            <p class="text-accent fw-semibold mb-1">ACCOUNT MANAGEMENT</p>
            <h1 class="display-6 fw-bold mb-2">Customer Accounts</h1>
            <p class="mb-0 text-white-50">Manage customer electricity connections from one place.</p>
        </div>
    </section>
    <main class="container dashboard-content pb-5">
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="stat-card card"><div class="card-body d-flex align-items-center gap-3"><div class="stat-icon"><i class="fas fa-users"></i></div><div><small class="text-muted">Total Accounts</small><div class="h4 mb-0 fw-bold"><?= count($accounts) ?></div></div></div></div>
            </div>
            <div class="col-md-6">
                <div class="stat-card card"><div class="card-body d-flex align-items-center gap-3"><div class="stat-icon"><i class="fas fa-bolt"></i></div><div><small class="text-muted">Active Connections</small><div class="h4 mb-0 fw-bold"><?= $activeAccounts ?></div></div></div></div>
            </div>
        </div>
        <div class="card dashboard-card">
            <div class="card-body p-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div><h2 class="h5 mb-1 fw-bold">Account Directory</h2><p class="text-muted mb-0 small">View and update customer connection details.</p></div>
                <a class="btn btn-primary px-4" href="<?= base_url('accounts/create') ?>"><i class="fas fa-plus me-2"></i>Add Account</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Account No.</th><th>Customer</th><th>Email</th><th>Phone</th><th>Type</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                    <?php foreach ($accounts as $account): ?>
                        <?php $status = esc($account['status']); ?>
                        <tr>
                            <td class="fw-semibold"><?= esc($account['account_number']) ?></td>
                            <td><?= esc($account['customer_name']) ?></td>
                            <td><?= esc($account['email']) ?></td>
                            <td><?= esc($account['phone']) ?></td>
                            <td><?= esc(ucfirst($account['connection_type'])) ?></td>
                            <td><span class="status-badge status-<?= $status ?>"><?= esc(ucfirst($account['status'])) ?></span></td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-outline-primary" href="<?= base_url('accounts/' . $account['id'] . '/edit') ?>"><i class="fas fa-pen me-1"></i>Edit</a>
                                <form class="d-inline" method="post" action="<?= base_url('accounts/' . $account['id'] . '/delete') ?>">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fas fa-trash me-1"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($accounts === []): ?><tr><td class="text-center empty-state" colspan="7"><i class="fas fa-bolt d-block mb-3"></i><strong class="d-block text-dark mb-1">No accounts yet</strong>Add your first customer account to get started.</td></tr><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>

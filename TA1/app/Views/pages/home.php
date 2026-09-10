<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="hero">
    <h1>Welcome to QuickSale POS</h1>
    <p>A simple starting point for managing your store's customer and staff accounts.</p>
    <a class="button" href="<?= site_url('customers') ?>">View Customers</a>
    <a class="button" href="<?= site_url('users') ?>">View Users</a>
</section>
<?= $this->endSection() ?>

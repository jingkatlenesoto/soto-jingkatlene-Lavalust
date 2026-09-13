<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products Management</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f7e7ce;
            background-image: radial-gradient(#ebd8ba 15%, transparent 16%), radial-gradient(#ebd8ba 15%, transparent 16%);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            color: #5c2f1e;
        }

        /* Navigation Header */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 30px;
            background: #5c2f1e;
            color: #f7ddb9;
            border-bottom: 3px solid #7c412b;
            box-shadow: 0 4px 10px rgba(92, 47, 30, 0.15);
        }

        nav h2 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 0.5px;
            color: #f7ddb9;
            text-transform: uppercase;
        }

        /* Logout Button Header Styling */
        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border: 2px solid #7c412b;
            border-radius: 20px;
            background: #f3be8a;
            color: #7c412b;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-logout:hover {
            background: #e7aa72;
        }

        /* Container & Grid Layout */
        .container {
            width: 95%;
            max-width: 1350px;
            margin: 25px auto;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 25px;
            align-items: start;
        }

        /* Cards Styling */
        .card {
            background: #f7ddb9;
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(124, 65, 43, 0.12);
            overflow: hidden;
            border: 3px solid #7c412b;
        }

        .card-header {
            padding: 16px 20px;
            background: #5c2f1e;
            border-bottom: 2px solid #7c412b;
        }

        .card-header h3 {
            margin: 0;
            font-size: 16px;
            color: #f7ddb9;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Form Inputs */
        .form-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group label {
            font-size: 11px;
            font-weight: bold;
            color: #7c412b;
            text-transform: uppercase;
        }

        .form-group input, .form-group textarea {
            padding: 10px 14px;
            border: 2px solid #7c412b;
            border-radius: 10px;
            background: #fdf3e7;
            font-size: 13px;
            color: #5c2f1e;
            outline: none;
            font-weight: bold;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-group input::placeholder, .form-group textarea::placeholder {
            color: #b58c73;
            font-weight: normal;
        }

        /* Buttons Styling */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            border: 2px solid #7c412b;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-create {
            margin-top: 8px;
            background: #f3be8a;
            color: #7c412b;
            font-size: 14px;
            padding: 10px;
            width: 100%;
        }

        .btn-create:hover {
            background: #e7aa72;
        }

        .btn-update {
            background: #fdf3e7;
            color: #7c412b;
        }

        .btn-update:hover {
            background: #f3be8a;
        }

        .btn-delete {
            background: #5c2f1e;
            color: #f7ddb9;
            border-color: #5c2f1e;
        }

        .btn-delete:hover {
            background: #3e1f14;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background-color: #fdf3e7;
            color: #7c412b;
            font-size: 12px;
            font-weight: bold;
            padding: 14px 18px;
            border-bottom: 2px solid #7c412b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px 18px;
            border-bottom: 1px solid #ebd8ba;
            font-size: 14px;
            color: #5c2f1e;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #fdf3e7;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        .badge-qty {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: bold;
        }

        .badge-icon-up {
            color: #2e7d32;
            font-weight: bold;
        }

        .badge-icon-down {
            color: #c62828;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav>
        <h2>Product Management</h2>
        <a href="<?= site_url('logout') ?>" class="btn-logout">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </nav>

    <main class="container">
        <div class="dashboard-grid">

            <!-- Add Product Form Sidebar -->
            <section class="card">
                <div class="card-header">
                    <h3>Add New Product</h3>
                </div>
                <form class="form-body" method="POST" action="<?= site_url('products/store') ?>">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" placeholder="Enter product name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" placeholder="Enter product description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" placeholder="0.00" required>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" placeholder="0" required>
                    </div>

                    <button class="btn btn-create" type="submit">
                        <i class="fa-solid fa-plus"></i> CREATE
                    </button>
                </form>
            </section>

            <!-- Products List Table Card -->
            <section class="card">
                <div class="card-header">
                    <h3>All Products</h3>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)): ?>
                            <tr>
                                <td colspan="7" style="text-align: center; color: #7c412b; font-weight: bold; padding: 30px;">
                                    No products found in database.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><strong>#<?= (int) $product['id'] ?></strong></td>
                                    <td><strong><?= htmlspecialchars($product['product_name']) ?></strong></td>
                                    <td style="color:#7c412b;"><?= htmlspecialchars($product['description']) ?></td>
                                    <td><strong>₱<?= number_format((float) $product['price'], 2) ?></strong></td>
                                    <td>
                                        <div class="badge-qty">
                                            <span><?= (int) $product['quantity'] ?></span>
                                            <?php if ((int)$product['quantity'] > 20): ?>
                                                <i class="fa-solid fa-arrow-up badge-icon-up"></i>
                                            <?php else: ?>
                                                <i class="fa-solid fa-arrow-down badge-icon-down"></i>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td style="color:#7c412b;"><?= htmlspecialchars($product['created_at']) ?></td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-update" href="<?= site_url('products/edit/' . $product['id']) ?>">
                                                <i class="fa-solid fa-pen-to-square"></i> Update
                                            </a>
                                            <form method="POST" action="<?= site_url('products/delete/' . $product['id']) ?>" onsubmit="return confirm('Delete this product?');" style="margin:0;">
                                                <button class="btn btn-delete" type="submit">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>

        </div>
    </main>

</body>
</html>
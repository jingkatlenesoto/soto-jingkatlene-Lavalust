<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Product</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            background-color: #f7e7ce;
            background-image: radial-gradient(#ebd8ba 15%, transparent 16%), radial-gradient(#ebd8ba 15%, transparent 16%);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            color: #5c2f1e;
        }

        .card {
            width: 100%;
            max-width: 650px;
            margin: auto;
            background: #f7ddb9;
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(124, 65, 43, 0.12);
            overflow: hidden;
            border: 3px solid #7c412b;
        }

        .card-header {
            padding: 20px 30px;
            background: #5c2f1e;
            border-bottom: 2px solid #7c412b;
        }

        .card-header h1 {
            margin: 0;
            font-size: 22px;
            color: #f7ddb9;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-body {
            padding: 30px;
        }

        .subtitle {
            margin-top: 0;
            margin-bottom: 25px;
            color: #7c412b;
            font-size: 14px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 18px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        label {
            display: block;
            font-size: 11px;
            font-weight: bold;
            color: #7c412b;
            text-transform: uppercase;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid #7c412b;
            border-radius: 10px;
            background: #fdf3e7;
            font-size: 14px;
            color: #5c2f1e;
            outline: none;
            font-weight: bold;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #5c2f1e;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(124, 65, 43, 0.2);
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border: 2px solid #7c412b;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #f3be8a;
            color: #7c412b;
        }

        .btn:hover {
            background: #e7aa72;
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .cancel {
            background: #5c2f1e;
            color: #f7ddb9;
            border-color: #5c2f1e;
        }

        .cancel:hover {
            background: #3e1f14;
        }

        .alert-message {
            display: none;
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
            border: 2px solid;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        @media (max-width: 600px) {
            .row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <main class="card">
        <div class="card-header">
            <h1>Edit Product</h1>
        </div>

        <div class="card-body">
            <p class="subtitle">
                Update the product information.
            </p>

            <div id="alertMessage" class="alert-message"></div>

            <form
                id="editProductForm"
                method="POST"
                action="<?= site_url('products/update/' . $product['id']) ?>"
            >
                <div class="form-group">
                    <label for="product_name">Product Name</label>

                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        maxlength="100"
                        value="<?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8') ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea
                        id="description"
                        name="description"
                        required
                    ><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="price">Price</label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            min="0"
                            step="0.01"
                            value="<?= htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8') ?>"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>

                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            min="0"
                            step="1"
                            value="<?= (int) $product['quantity'] ?>"
                            required
                        >
                    </div>
                </div>

                <div class="actions">
                    <button class="btn" type="submit" id="submitBtn">
                        Update Product
                    </button>

                    <a
                        class="btn cancel"
                        href="<?= site_url('products') ?>"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('editProductForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = this;
            const submitBtn = document.getElementById('submitBtn');
            const alertBox = document.getElementById('alertMessage');
            const formData = new FormData(form);

            submitBtn.disabled = true;
            submitBtn.innerText = 'Updating...';
            alertBox.style.display = 'none';

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (response.ok) {
                    alertBox.className = 'alert-message alert-success';
                    alertBox.innerText = 'Product updated successfully!';
                    alertBox.style.display = 'block';

                    // Optional redirect back to main products list after 1.5 seconds
                    setTimeout(() => {
                        window.location.href = "<?= site_url('products') ?>";
                    }, 1500);
                } else {
                    throw new Error('Server returned an error');
                }
            } catch (error) {
                alertBox.className = 'alert-message alert-error';
                alertBox.innerText = 'Failed to update product. Please try again.';
                alertBox.style.display = 'block';
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Update Product';
            }
        });
    </script>
</body>
</html>
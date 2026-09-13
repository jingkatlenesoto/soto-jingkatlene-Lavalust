<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            padding: 40px 20px;
            margin: 0;
            color: #333333;
        }

        /* Card Container around the table */
        .table-card {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            padding: 24px;
            border: 1px solid #eef1f6;
        }

        .table-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e293b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #8c98a4;
            padding: 12px 16px;
            border-bottom: 2px solid #edf2f7;
        }

        td {
            font-size: 13px;
            color: #4a5568;
            padding: 16px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
        }

        /* Zebra striping / Hover effect */
        tbody tr:hover {
            background-color: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>

    <div class="table-card">
        <div class="table-title">User Summary</div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['firstname']); ?></td>
                        <td><?= htmlspecialchars($user['lastname']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td><?= htmlspecialchars($user['username']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
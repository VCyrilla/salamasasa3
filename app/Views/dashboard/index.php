<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:40px">
            <div class="col-md-4 col-md-offset-4">
                <h4>Dashboard</h4><hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= ucfirst($userInfo['name']);?></td>
                            <td><?= $userInfo['email'];?></td>
                            <td><a href="<?= site_url('auth/logout'); ?>">Logout</a></td>

                        </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</body>
</html>
<?= $this-> extend('layouts/frontend.php') ?>

<?= $this-> section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">

            <?php
            if (session()->getFlashdata('status'))
            {
                echo "<h4>" .session()->getFlashdata('status')."</h4>";
            } 
            ?>
            
            <div class="card-header">
                <h4>Doctor Data</h4>
                <a href="<?= base_url('doctor-add') ?>" class="btn btn-primary float-end">Add Doctor</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Specialisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($doctor as $row) : ?>
                        <tr>
                            <td><?= $row['userID'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['role'] ?></td>
                            <td><?= $row['specialisation'] ?></td>
                            <td>
                                <a href="<?=base_url('doctor/edit/'.$row['userID']) ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="<?=base_url('doctor/delete/'.$row['userID']) ?>" class="btn btn-danger btn-sm">Delete</a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?= $this-> endSection() ?>


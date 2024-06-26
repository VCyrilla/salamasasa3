<?= $this-> extend('layouts/frontend.php') ?>

<?= $this-> section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                <h4>Edit Doctor
                <a href="<?= base_url('doctor') ?>" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('doctor/update/' .$doctor['userID']) ?>" method="POST">


            
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="form-group mb-3"></div>
                        <label> Name</label>
                        <input type="text" name="name" value="<?= $doctor['name'] ?>" class="form-control" placeholder="Enter full name">
                        </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3"></div>
                        <label> Email</label>
                        <input type="text" name="email" value="<?= $doctor['email'] ?>" class="form-control" placeholder="Enter email address">
                        </div>
                        <div class="col-md-12">
                    <div class="form-group mb-3"></div>
                        <label> Area of Specialisation</label>
                        <select name="specialisation" class="form-control">
                              <option value="">Choose specialisation</option>
                              <option value="Counselling" <?= $doctor['specialisation'] == 'Counselling' ? 'selected' : '' ?>>Counselling</option>
                              <option value="Gynaecology" <?= $doctor['specialisation'] == 'Gynaecology' ? 'selected' : '' ?>>Gynaecology</option>
                              <option value="Social work" <?= $doctor['specialisation'] == 'Social work' ? 'selected' : '' ?>>Social work</option>
                              <option value="Gender dysphoria" <?= $doctor['specialisation'] == 'Gender dysphoria' ? 'selected' : '' ?>>Gender dysphoria</option>
                              <option value="Sexual health" <?= $doctor['specialisation'] == 'Sexual health' ? 'selected' : '' ?>>Sexual health</option>
                              <option value="General" <?= $doctor['specialisation'] == 'General' ? 'selected' : '' ?>>General</option>


                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-4">Update Doctor</button>
                        </div>
                    </div>



                </div>
                </form>
             </div>
        </div>


    </div>
</div>
</div>
<?= $this-> endSection() ?>
<?= $this-> extend('layouts/frontend.php') ?>

<?= $this-> section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                <h4>Add Doctor
                <a href="<?= base_url('doctor') ?>" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('doctor-store') ?>" method="POST">


            
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="form-group mb-3"></div>
                        <label> Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter full name">
                        </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3"></div>
                        <label> Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email address">
                        </div>
                        <div class="col-md-12">
                    <div class="form-group mb-3"></div>
                        <label> Area of Specialisation</label>
                        <select name="specialisation" class="form-control">
                              <option value="">Choose specialisation</option>
                                <option value="Counselling">Counselling</option>
                                <option value="Gynaecology">Gynaecology</option>
                                <option value="Social work">Social work</option>
                                <option value="Gender dysphoria">Gender dysphoria</option>
                                <option value="Sexual health">Sexual health</option>
                                <option value="General">General</option>

                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-4">Save Doctor</button>
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
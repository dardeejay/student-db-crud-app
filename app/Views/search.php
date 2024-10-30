<?= $this->extend('welcome_message') ?>
<?= $this->section('content') ?>
<div class="container p-5">
    <h1 class="text-left poppins-semibold font-blue">Search Student</h1>
    <hr>
    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
        <form action="/" method="GET">
            <div class="input-group">
                <input type="search" placeholder="Search for students by LRN, First Name or Last Name" name="search" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                <div class="input-group-append">
                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <?php if (isset($students) && !empty($students)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>LRN</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= esc($student['lrn']) ?></td>
                            <td><?= esc($student['first_name']) ?></td>
                            <td><?= esc($student['last_name']) ?></td>
                            <td class="d-flex gap-2 justify-content-center">
                                <a href="/student/info?lrn=<?= esc($student['lrn']) ?>" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
                                <a href="/edit<?= esc($student['lrn']) ?>" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $student['lrn'] ?>"><i class="fas fa-trash"></i> Delete</a>
                            </td>

                        </tr>
                        <div class="modal fade" id="exampleModal<?= $student['lrn'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this student? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="/student/delete" method="POST">
                                            <input type="hidden" name="lrn" value="<?= $student['lrn']; ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>

        <p>No students found.</p>
    <?php endif; ?>

</div>
<?= $this->endsection('content') ?>
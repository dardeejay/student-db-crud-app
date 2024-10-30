<?= $this->extend('welcome_message') ?>
<?= $this->section('content') ?>
<div class="container p-5">
    <h1 class="text-left poppins-semibold font-blue">Update Student Info</h1>
    <hr>
    <?php if (isset($success) && !empty($success)): ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif; ?>
    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error) : ?>
                <?= esc($error) ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($student) && !empty($student)): ?>
        <form action="/api/student/edit" method="POST">
            <!-- LRN -->
            <div class="mb-3">
                <label for="lrn" class="form-label">Learning Reference Number (LRN)</label>
                <input type="text" class="form-control" id="lrn" name="lrn" required value="<?= $student['lrn']; ?>">
            </div>

            <!-- First Name -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required value="<?= $student['first_name']; ?>">
            </div>

            <!-- Middle Name -->
            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?= $student['middle_name'] ?>">
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required value="<?= $student['last_name'] ?>">
            </div>

            <!-- Junior High School -->
            <div class="mb-3">
                <label for="jr_high_school" class="form-label">Junior High School</label>
                <input type="text" class="form-control" id="jr_high_school" name="jr_high_school" value="<?= $student['jr_high_school'] ?>">
            </div>
            <?php foreach ($student_grades as $grade): ?>
                <div class="mb-3">
                    <input type="hidden" name="g<?= $grade['grade_level'] ?>_id" value="<?= $grade['id']; ?>">
                    <label for="g<?= $grade['grade_level'] ?>_average_grade" class="form-label">Grade <?= $grade['grade_level'] ?> Average Grade</label>
                    <input type="number" step="0.01" class="form-control" id="g<?= $grade['grade_level'] ?>_average_grade" name="g<?= $grade['grade_level'] ?>_average_grade" value="<?= $grade['average_grade'] ?>">
                </div>
            <?php endforeach; ?>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php endif; ?>
</div>

<?= $this->endsection('content') ?>
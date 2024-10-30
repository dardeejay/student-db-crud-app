<?= $this->extend('welcome_message') ?>
<?= $this->section('content') ?>
<div class="container p-5">
    <h1 class="text-left poppins-semibold font-blue">Add Student</h1>
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

    <form action="/api/student/create" method="POST">

        <!-- LRN -->
        <div class="mb-3">
            <label for="lrn" class="form-label">Learning Reference Number (LRN)</label>
            <input type="text" class="form-control" id="lrn" name="lrn" required>
        </div>

        <!-- First Name -->
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>

        <!-- Middle Name -->
        <div class="mb-3">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name">
        </div>

        <!-- Last Name -->
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>

        <!-- Junior High School -->
        <div class="mb-3">
            <label for="jr_high_school" class="form-label">Junior High School</label>
            <input type="text" class="form-control" id="jr_high_school" name="jr_high_school">
        </div>

        <!-- Grade 7 Average Grade -->
        <div class="mb-3">
            <label for="g7_average_grade" class="form-label">Grade 7 Average Grade</label>
            <input type="number" step="0.01" class="form-control" id="g7_average_grade" name="g7_average_grade">
        </div>

        <!-- Grade 8 Average Grade -->
        <div class="mb-3">
            <label for="g8_average_grade" class="form-label">Grade 8 Average Grade</label>
            <input type="number" step="0.01" class="form-control" id="g8_average_grade" name="g8_average_grade">
        </div>

        <!-- Grade 9 Average Grade -->
        <div class="mb-3">
            <label for="g9_average_grade" class="form-label">Grade 9 Average Grade</label>
            <input type="number" step="0.01" class="form-control" id="g9_average_grade" name="g9_average_grade">
        </div>

        <!-- Grade 10 Average Grade -->
        <div class="mb-3">
            <label for="g10_average_grade" class="form-label">Grade 10 Average Grade</label>
            <input type="number" step="0.01" class="form-control" id="g10_average_grade" name="g10_average_grade">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?= $this->endsection('content') ?>
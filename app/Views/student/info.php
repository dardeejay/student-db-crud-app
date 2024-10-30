<?= $this->extend('welcome_message') ?>
<?= $this->section('content') ?>

<div class="container p-5">
    <h1 class="text-left poppins-semibold font-blue">Student Information</h1>
    <hr>
    <?php if (isset($student) && !empty($student)): ?>

        <div class="row">
            <div class="col-3">
                <h6 class="poppins-bold font-black">Full Name</h6>
                <h3 class="poppins-semibold font-blue text-wrap"> <?= $student['full_name'] ?> </h3>
            </div>
            <div class="col-3">
                <h6 class="poppins-bold font-black">Learner's Reference Number</h6>
                <h3 class="poppins-semibold font-blue text-wrap"> <?= $student['lrn'] ?> </h3>
            </div>
            <div class="col-6">
                <h6 class="poppins-bold font-black">Junior High School</h6>
                <h3 class="poppins-semibold font-blue text-wrap"> <?= $student['jr_high_school'] ?> </h3>
            </div>
        </div>
        <hr>
        <div>
            <h5 class="poppins-bold font-black">Grades</h5>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Grade Level</th>
                        <th>Average Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sum = 0;
                    $total_avg;
                    foreach ($studentGrades as $grade):
                        $sum += $grade['average_grade'];
                    ?>
                        <tr>
                            <td><?= esc($grade['grade_level']) ?></td>
                            <td><?= esc($grade['average_grade']) ?></td>
                        </tr>
                    <?php endforeach;
                    $total_avg = $sum / count($studentGrades);
                    ?>
                </tbody>
            </table>
            <h5 class="poppins-bold font-black">Final Average Grade:<span class="font-blue ms-3"><?= $total_avg; ?></span> </h5>

        </div>
    <?php endif; ?>

</div>
<?= $this->endsection('content') ?>
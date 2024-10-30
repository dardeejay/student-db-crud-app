<nav class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height: 100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="fas fa-clipboard me-2" style="font-size: 40px;"></i>
        <span class="fs-4">Student Records</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link <?= uri_string() === '' ? 'active' : 'text-white' ?>" aria-current="page">
                <i class="fas fa-user-graduate me-2"></i>
                Search Student
            </a>
        </li>
        <li>
            <a href="/student/list-all" class="nav-link <?= uri_string() === 'student/list-all' ? 'active' : 'text-white' ?>">
                <i class="fas fa-users me-2"></i>
                Students Masterlist
            </a>
        </li>
        <li>
            <a href="/student/add" class="nav-link <?= uri_string() === 'student/add' ? 'active' : 'text-white' ?>">
                <i class="fas fa-user-plus me-2"></i>
                Add Student
            </a>
        </li>
    </ul>
</nav>
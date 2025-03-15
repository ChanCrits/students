<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            
            color: #ffffff;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }
        .modal-header.add {
            background-color:rgb(17, 17, 17); /* Green */
            color: white;
        }
        .modal-header.edit {
            background-color:rgb(17, 17, 17); /* Green */
            color: white;
        }
        .modal-header.delete {
            background-color:rgb(17, 17, 17); /* Green */
            color: white;
        }
        .table {
            background-color: #495057;
            color: #ffffff;
        }
        .table thead {
            background-color: #212529;
        }
        .table th, .table td {
            border-color: #6c757d;
        }
        .navbar {
            background-color: #212529;
        }
        .navbar-brand, .nav-link, .btn-danger {
            color: #ffffff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-users"></i> Student Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li> -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Students Records</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
                Add Student
            </button>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Program</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->course }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#editStudentModal" data-student-id="{{ $student->id }}" data-student-name="{{ $student->name }}" data-student-email="{{ $student->email }}" data-student-age="{{ $student->age }}" data-student-course="{{ $student->course }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#confirmDeleteModal" data-student-id="{{ $student->id }}">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header add">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="studentName">Name</label>
                            <input type="text" class="form-control bg-dark text-white" id="studentName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="studentEmail">Email</label>
                            <input type="email" class="form-control bg-dark text-white" id="studentEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="studentAge">Age</label>
                            <input type="number" class="form-control bg-dark text-white" id="studentAge" name="age" required>
                        </div>
                        <div class="form-group">
                            <label for="studentCourse">Course</label>
                            <input type="text" class="form-control bg-dark text-white" id="studentCourse" name="course" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header edit">
                    <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editStudentName">Name</label>
                            <input type="text" class="form-control" id="editStudentName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="editStudentEmail">Email</label>
                            <input type="email" class="form-control" id="editStudentEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="editStudentAge">Age</label>
                            <input type="number" class="form-control" id="editStudentAge" name="age" required>
                        </div>
                        <div class="form-group">
                            <label for="editStudentCourse">Course</label>
                            <input type="text" class="form-control" id="editStudentCourse" name="course" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header delete">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this student?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#editStudentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var studentId = button.data('student-id');
            var studentName = button.data('student-name');
            var studentEmail = button.data('student-email');
            var studentAge = button.data('student-age');
            var studentCourse = button.data('student-course');

            var modal = $(this);
            modal.find('#editStudentName').val(studentName);
            modal.find('#editStudentEmail').val(studentEmail);
            modal.find('#editStudentAge').val(studentAge);
            modal.find('#editStudentCourse').val(studentCourse);

            var form = $('#editForm');
            form.attr('action', '/students/' + studentId);
        });

        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var studentId = button.data('student-id');
            var form = $('#deleteForm');
            form.attr('action', '/students/' + studentId);
        });
    </script>
</body>
</html>
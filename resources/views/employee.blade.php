<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
</head>

<body>


    <div class="container mx-auto p-4">
        <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-6">Create Employee</h2>
            <form id="myform">
                @csrf
                <input type="hidden" id="employeeId" name="employeeId">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" type="text" name="name" required>
                    <div class="error" id="name-error" style="color: red;"></div>

                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="dob">Date of Birth</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="dob" type="date" name="dob" required>
                    <div class="error" id="dob-error" style="color: red;"></div>

                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Phone</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="phone" type="text" name="phone" required>
                    <div class="error" id="phone-error" style="color: red;"></div>

                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Status</label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="status" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" name="email" required>
                    <div class="error" id="email-error" style="color: red;"></div>

                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hobbies">Hobbies</label>
                    <div class="flex flex-wrap">
                        <label class="inline-flex items-center mr-4 mb-2">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                value="Reading">
                            <span class="ml-2 text-gray-700">Reading</span>
                        </label>
                        <label class="inline-flex items-center mr-4 mb-2">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                value="Traveling">
                            <span class="ml-2 text-gray-700">Traveling</span>
                        </label>
                        <label class="inline-flex items-center mr-4 mb-2">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                value="Cooking">
                            <span class="ml-2 text-gray-700">Cooking</span>
                        </label>
                        <label class="inline-flex items-center mr-4 mb-2">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                value="Swimming">
                            <span class="ml-2 text-gray-700">Swimming</span>
                        </label>
                        <label class="inline-flex items-center mr-4 mb-2">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                value="Gaming">
                            <span class="ml-2 text-gray-700">Gaming</span>
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Gender</label>
                    <div class="flex items-center">
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" class="form-radio h-5 w-5 text-gray-600" name="gender"
                                value="Male" checked required>
                            <span class="ml-2 text-gray-700">Male</span>
                        </label>
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" class="form-radio h-5 w-5 text-gray-600" name="gender"
                                value="Female" required>
                            <span class="ml-2 text-gray-700">Female</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-5 w-5 text-gray-600" name="gender"
                                value="Other" required>
                            <span class="ml-2 text-gray-700">Other</span>
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button id="btn"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">Save</button>
                    <button id="update-btn"
                        class="bg-blue-500 hidden hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline update-btn"
                        type="button">Update</button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-gray-100 flex justify-center items-center mb-8">
        <div class=" w-full bg-white shadow-md rounded p-8 ">
            <h2 class="text-2xl font-bold mb-6 text-center">Employee List</h2>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">DOB</th>
                        <th class="py-2 px-4 border-b">Phone</th>
                        <th class="py-2 px-4 border-b">Gender</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Hobbies</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody">
                    <!-- Employee data will be appended here -->
                </tbody>
            </table>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            //fetch all record when page reload or ready
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            fetchEmployees();

            function fetchEmployees() {
                $.ajax({
                    url: "{{ url('employee/list') }}",
                    type: "get",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        populateTable(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching employee data:', error);
                    }
                });
            }
            // Function to populate the table with employee data
            function populateTable(employees) {
                let employeeTableBody = $('#employeeTableBody');
                employeeTableBody.empty(); // Clear existing table rows

                $.each(employees.data, function(index, employee) {
                    let hobbies = employee.hobbies ? employee.hobbies : '';
                    let row = `<tr>
            <td class="py-2 px-4 border-b">${employee.name}</td>
            <td class="py-2 px-4 border-b">${employee.dob}</td>
            <td class="py-2 px-4 border-b mx-4">${employee.phone}</td>
            <td class="py-2 px-4 border-b">${employee.gender}</td>
            <td class="py-2 px-4 border-b">${employee.email}</td>
            <td class="py-2 px-4 border-b">${hobbies}</td>
            <td class="py-2 px-4 border-b">${employee.status}</td>
            <td class="py-2 px-4 border-b">
                    <button data-id="${employee.id}" class="edit-btn text-blue-500 hover:underline">Edit</button>
                    <button data-id="${employee.id}" class="delete-btn text-red-500 hover:underline">Delete</button>
            </td>
        </tr>`;
                    employeeTableBody.append(row);
                });
            }

            //validation when user type in input fields
            $("input[name='name']").on('input', function() {
                var name = $(this).val().trim();
                var namePattern = /^[a-zA-Z\s]+$/;
                if (name === "") {
                    $("#name-error").text("Name is required");
                } else if (!namePattern.test(name)) {
                    $("#name-error").text("Name should not contain numbers or special characters");
                } else {
                    $("#name-error").text("");
                }
            });

            $("input[name='email']").on('input', function() {
                var email = $(this).val().trim();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (email === "") {
                    $("#email-error").text("Email is required").css("color", "red");
                } else if (!emailPattern.test(email)) {
                    $("#email-error").text("Invalid email format").css("color", "red");
                } else {
                    $("#email-error").text("");
                }
            });

            $(document).ready(function() {
                $("input[name='phone']").on('input', function() {
                    var phone = $(this).val().trim();
                    var phonePattern = /^\d{10}$/;

                    if (phone === "") {
                        $("#phone-error").text("Phone number is required").css("color", "red");
                    } else if (!phonePattern.test(phone)) {
                        $("#phone-error").text("Phone number must be 10 digits number").css("color",
                            "red");
                    } else {
                        $("#phone-error").text("");
                    }
                });
            });

            $("input[name='dob']").on('input', function() {
                var dob = $(this).val().trim();
                var dobDate = new Date(dob);
                var currentDate = new Date();
                var eighteenYearsAgo = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(),
                    currentDate.getDate());

                if (dob === "") {
                    $("#dob-error").text("Date of Birth is required").css("color", "red");
                } else if (dobDate > eighteenYearsAgo) {
                    $("#dob-error").text("You must be at least 18 years old").css("color", "red");
                } else {
                    $("#dob-error").text("");
                }
            });

            //create employee
            $('#btn').click(function(e) {
                e.preventDefault();
                var isValid = true;
                $("input[name='name']").trigger('input');
                $("input[name='email']").trigger('input');
                $("input[name='dob']").trigger('input');
                $("input[name='phone']").trigger('input');

                $(".error").each(function() {
                    if ($(this).text() !== "") {
                        isValid = false;
                    }
                });

                if (isValid) {
                    $.ajax({
                        url: "{{ url('employee/store') }}",
                        type: "post",
                        dataType: "json",
                        data: $('#myform').serialize(),
                        // headers: {
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        // },
                        success: function(response) {
                            $('#myform')[0].reset();
                            fetchEmployees();
                            console.log(response);
                        }
                    })
                }
            })

            // Edit employee
            $(document).on('click', '.edit-btn', function() {
                let employeeId = $(this).data('id');
                $.ajax({
                    url: `{{ url('employee/edit') }}/${employeeId}`,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            let employee = response.data;
                            $('#employeeId').val(employee.id);
                            $('#name').val(employee.name);
                            $('#dob').val(employee.dob);
                            $('#phone').val(employee.phone);
                            $('#status').val(employee.status);
                            $('#email').val(employee.email);
                            $("input[name='gender'][value='" + employee.gender + "']").prop(
                                'checked', true);

                            $("input[name='hobbies[]']").each(function() {
                                $(this).prop('checked', employee.hobbies.includes($(
                                    this).val()));
                            });
                            $('#update-btn').removeClass('hidden');
                            $('#btn').addClass('hidden');


                        } else {
                            console.error('Error fetching employee data');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching employee data:', error);
                    }
                });
            });

            // Update employee
            $('#update-btn').click(function(e) {
                e.preventDefault();
                var isValid = true;
                $("input[name='name']").trigger('input');
                $("input[name='email']").trigger('input');
                $("input[name='dob']").trigger('input');
                $("input[name='phone']").trigger('input');

                $(".error").each(function() {
                    if ($(this).text() !== "") {
                        isValid = false;
                    }
                });

                if (isValid) {
                    let employeeId = $('#employeeId').val();
                    let formData = $('#myform').serialize();
                    $.ajax({
                        url: `{{ url('employee/update') }}/${employeeId}`,
                        type: "PUT",
                        dataType: "json",
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            if (response.status === 'success') {
                                $('#myform')[0].reset();
                                $('#update-btn').addClass('hidden');
                                $('#btn').removeClass('hidden');

                                fetchEmployees(); // Fetch the updated employee list
                                console.log(response.message);
                            } else {
                                console.error(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating employee data:', error);
                        }
                    });
                }
            });


            // Delete employee
            $(document).on('click', '.delete-btn', function() {
                let employeeId = $(this).data('id');
                if (confirm('Are you sure you want to delete this employee?')) {
                    $.ajax({
                        url: `{{ url('employee/delete') }}/${employeeId}`,
                        type: "DELETE",
                        dataType: "json",
                        success: function(response) {
                            if (response.status === 'success') {
                                fetchEmployees(); // Fetch the updated employee list
                                console.log(response.message);
                            } else {
                                console.error(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting employee data:', error);
                        }
                    });
                }
            });


        })
    </script>
</body>

</html>

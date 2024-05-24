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
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" type="text" name="name" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="dob">
                        Date of Birth
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="dob" type="date" name="dob" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Phone
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="phone" type="text" name="phone" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                        Status
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="gender" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" name="email" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hobbies">
                        Hobbies
                    </label>
                    {{-- <div class="flex flex-wrap">
                    @foreach (['Reading', 'Traveling', 'Cooking', 'Swimming', 'Gaming'] as $hobby)
                        <label class="inline-flex items-center mr-4 mb-2">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]" value="{{ $hobby }}">
                            <span class="ml-2 text-gray-700">{{ $hobby }}</span>
                        </label>
                    @endforeach
                </div> --}}
                    <div class="flex">
                        <div class="flex flex-wrap">
                            <label class="inline-flex items-center mr-4 mb-2">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                    value="Reading">
                                <span class="ml-2 text-gray-700">Reading</span>
                            </label>
                        </div>
                        <div class="flex flex-wrap">
                            <label class="inline-flex items-center mr-4 mb-2">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                    value="Traveling">
                                <span class="ml-2 text-gray-700">Traveling</span>
                            </label>
                        </div>
                        <div class="flex flex-wrap"> <label class="inline-flex items-center mr-4 mb-2"> <input
                                    type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                    value="Cooking"> <span class="ml-2 text-gray-700">Cooking</span> </label> </div>
                    </div>
                    <div class="flex">
                        <div class="flex flex-wrap"> <label class="inline-flex items-center mr-4 mb-2"> <input
                                    type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                    value="Swimming"> <span class="ml-2 text-gray-700">Swimming</span> </label> </div>
                        <div class="flex flex-wrap"> <label class="inline-flex items-center mr-4 mb-2"> <input
                                    type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="hobbies[]"
                                    value="Gaming"> <span class="ml-2 text-gray-700">Gaming</span> </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                            Gender </label>
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
                            type="submit">
                            Save
                        </button>
                    </div>
            </form>
        </div>
    </div>

    <div class="container  mx-auto text-center">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-6">Employee List</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">DOB</th>
                        <th class="py-2 px-4 border-b ">Phone</th>
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
        </tr>`;
        employeeTableBody.append(row);
    });
}


            //create employee
            $('#btn').click(function(e) {
                e.preventDefault();
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
                        console.log(response);
                    }
                })
            })
        })
    </script>
</body>

</html>

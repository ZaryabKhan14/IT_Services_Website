<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<style>
    .custom-btn-spacing {
    margin-right: 5px; /* Adjust the value as needed */
}

</style>
@include('admin.tags')
@include('admin.sidebar')
@include('admin.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Student Table</h6>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example" style="wdith:200%">
                        <thead class="table-dark">
                            <tr> 
                                <th scope="col">#</th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Service Description</th>
                                <th scope="col">Serivce Icon</th>
                                <th scope="col">Actions</th> <!-- Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show_service as $service)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ $service->service_description }}</td>
                                <td>{{ $service->service_icon }}</td>
                                <td>
                                <div class="btn-group" role="group">
                                <a href="javascript:void(0);" class="btn btn-warning btn-sm custom-btn-spacing" onclick="confirmEdit('{{ url('/admin/service_edit_form', $service->id) }}')">Edit</a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm custom-btn-spacing" onclick="confirmDelete('{{ url('/admin/delete_service', $service->id) }}')">Delete</a>
                                </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<script>
    function confirmEdit(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to edit this user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, edit it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    function confirmDelete(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to delete this user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
@include('admin.footer')

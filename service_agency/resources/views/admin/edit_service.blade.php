@include('admin.tags')
@include('admin.sidebar')
@include('admin.navbar')

<style>
.full-height {
    height: 60vh; /* Full viewport height */
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
}

.custom-width {
    width: 100%;
}

.bg-light-rounded {
    background-color: #f8f9fa; /* Ensure this matches your design */
    border-radius: 0.5rem;
    padding: 2rem;
}
</style>

<div class="full-height">
    <div class="col-10 custom-width">
        <div class="bg-light-rounded">
            <h6 class="mb-4">Edit User Form</h6>
            <form id="addserviceform" action="{{ route('update_service',['id' => $edit_service->id])  }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Name" value="{{ ( $edit_service->service_name) }}">
                    <label for="service_name">Service Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="service_description" name="service_description" placeholder="service_description" value="{{ ( $edit_service->service_description) }}">
                    <label for="service_description">Service Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="service_icon" name="service_icon" placeholder="service_icon" value="{{ ( $edit_service->service_icon) }}">
                    <label for="service_icon">Service Icon</label>
                </div>
             
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
// Check for success message from session
@if(session('success'))
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
@endif

// Check for error messages from validation     
@if($errors->any())
    Swal.fire({
        title: 'Error!',
        text: '{{ $errors->first() }}', // Display the first error message
        icon: 'error',
        confirmButtonText: 'OK'
    });
@endif

document.getElementById('addserviceform').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to add this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, add it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, submit the form
            this.submit();
        }
    })
});
</script>

@include('admin.footer')

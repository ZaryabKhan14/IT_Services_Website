<!-- Add SweetAlert2 via CDN -->

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
            <h6 class="mb-4">Add User Form</h6>
            <form id="addUserForm" action="{{route('add_contact_details')}}" method="POST" enctype="multipart/form-data">
            @csrf
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="contact_address" name="contact_address" placeholder="Contact Address" required>
                    <label for="contact_address">Contact Address</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" required>
                <label for="contact_number">Contact Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Contact Email" required>
                    <label for="contact_email">Contact Email</label>
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

document.getElementById('addUserForm').addEventListener('submit', function(event) {
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

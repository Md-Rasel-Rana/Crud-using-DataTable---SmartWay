<!-- Button trigger modal -->
<button type="button" class="btn btn-lg btn-primary ml-4  mt-4" data-toggle="modal" data-target="#exampleModal">
    Create user
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <h2> User Form</h2></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
    <div class="container border border-4">
        <form id="save-form">
            @csrf
            <div class="mb-3">
                <label for="First Name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="Enter First Name">
            </div>
            <div class="mb-3">
                <label for="Last Name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="LastName" id="LastName" placeholder="Enter Last Name">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control" name="Email" id="Email" placeholder="EnterEmail">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="text" class="form-control" id="Password" name="Password" placeholder="Enter Password">
            </div>
            {{-- <button type="submit" class="btn btn-primary m-auto"> Submit </button> --}}
        </form>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="modal-close" class="btn btn-danger"  data-dismiss="modal">Close</button>
          <button type="button" onclick="save()" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script>
async function save() {
    let FirstName = document.getElementById('FirstName').value;
    let LastName = document.getElementById('LastName').value;
    let Email = document.getElementById('Email').value;
    let Password = document.getElementById('Password').value;

    let formData = new FormData();
    formData.append('FirstName', FirstName);
    formData.append('LastName', LastName);
    formData.append('Email', Email);
    formData.append('Password', Password);

    let config = {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    };

    try {
        let res = await axios.post('/send-user-Data', formData, config);
        console.log(res.data); // Assuming you want to log the response
        document.getElementById('modal-close').click();
        document.getElementById('save-form').reset();
        getList();
    } catch (error) {
        console.error('Error:', error);
    }
}


  </script>



  
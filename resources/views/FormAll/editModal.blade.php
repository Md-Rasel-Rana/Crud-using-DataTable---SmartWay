<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          </div>
          <div class="modal-body">
            <form id="save-Form">
              <input type="hidden" name="update-btn" id="update-btn">
             
              <div class="mb-3">
                  <label for="First Name" class="form-label">First Name</label>
                  <input type="text" class="form-control" name="FirstName" id="editFirstName" placeholder="Enter First Name">
              </div>
              <div class="mb-3">
                  <label for="Last Name" class="form-label">Last Name</label>
                  <input type="text" class="form-control" name="LastName" id="editLastName" placeholder="Enter Last Name">
              </div>
              <div class="mb-3">
                  <label for="Email" class="form-label">Email</label>
                  <input type="text" class="form-control" name="Email" id="editEmail" placeholder="EnterEmail">
              </div>
              <div class="mb-3">
                  <label for="Password" class="form-label">Password</label>
                  <input type="text" class="form-control" id="editPassword" name="Password" placeholder="Enter Password">
              </div>
              {{-- <button type="submit" class="btn btn-primary m-auto"> Submit </button> --}}
          </form>
          </div>
          <div class="modal-footer">
              <button id="update-modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
              <button  onclick="Update()" id="update-btn" class="btn btn-success" >Update</button>
          </div>
      </div>
  </div>
</div>

<script>
  FillUpUpdateForm();
  async function  FillUpUpdateForm(id){
   
    let response = await axios(`/get-user/${id}`);
    let data = await response.data;
    console.log(data);   
    document.getElementById('editFirstName').value = data.FirstName;
    document.getElementById('editLastName').value = data.LastName;
    document.getElementById('editEmail').value = data.Email;
    document.getElementById('editPassword').value = data.Password;
    document.getElementById('update-btn').value =data.id;
 
  }
  async function Update() {
    
    try{
      let id = document.getElementById('update-btn').value;
      let firstName = document.getElementById('editFirstName').value;
      let lastName = document.getElementById('editLastName').value;
      let email = document.getElementById('editEmail').value;
      let password = document.getElementById('editPassword').value;
      let response = await axios.put(`/update-user/${id}`, {
        FirstName: firstName,
        LastName: lastName,
        Email: email,
        Password: password
      });
      document.getElementById('update-modal-close').click();
      document.getElementById('save-Form').reset();
      if(response.status == 200){
        swal({
            title: "Success!",
            text: "User data Update successfully",
            icon: "success",
            button: "OK",
        });
      }
      getList();
    }
    catch(err){
      console.log(err);
    }
  }


</script>

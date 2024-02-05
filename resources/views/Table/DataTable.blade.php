<div class="container-fluid mt-3">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="card px-5 py-5">
          <div class="row justify-content-between ">
              <div class="align-items-center col">
                  <h4>User List</h4>
              </div>
          
          </div>
          <hr class="bg-secondary"/>
          <div class="table-responsive">
          <table class="table" id="tableData">
              <thead>
              <tr class="bg-light">
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody id="tableList">

              </tbody>
          </table>
          </div>
      </div>
  </div>
</div>
</div>

<script>

  getList();
  
  
  async function getList(){
      //showLoader();
      let res=await axios.get("/List-data");
     // hideLoader();
    // console.log(res);
      let tableList=$("#tableList");
      let tableData=$("#tableData");
  
      tableData.DataTable().destroy();
      tableList.empty();
  
      res.data.forEach(function (item,index) {
          let row=`<tr>
                      <td>${item['FirstName']}</td>
                      <td>${item['LastName']}</td>
                      <td>${item['Email']}</td>
                      <td>${item['Password']}</td>
                      <td>
                          <button data-id="${item['id']}" class="viewBtn btn btn-warning text-sm px-3 py-1 btn-sm m-0"><i class="fa text-sm fa-eye">Edit</i></button>
                          <button data-id="${item['id']}" class="deleteBtn btn btn-danger text-sm px-3 py-1 btn-sm m-0"><i class="fa text-sm  fa-trash-alt">Delete</i></button>
                      </td>
                   </tr>`
          tableList.append(row)
      })

      $(document).on('click', '.deleteBtn', async function() {
      let userId = $(this).data('id');
    
    try {
        let response = await axios.delete(`/delete-user/${userId}`);
        //console.log(response); // Assuming you want to log the response
        // If deletion is successful, you can remove the row from the table
        $(this).closest('tr').remove();
        if(response.status == 200){
        swal({
            title: "Success!",
            text: "User Data Delete successfully",
            icon: "success",
            button: "OK",
        });
    }
        
    } catch (error) {
        console.error('Error deleting user:', error);
    }
});

$('.viewBtn').on('click', async function () {
           let id= $(this).data('id');
           await FillUpUpdateForm(id);
           $("#update-modal").modal('show');
          
    })
      new DataTable('#tableData',{
          order:[[0,'desc']],
          lengthMenu:[5,10,15,20,30]
      });

  
  }

  
  
  </script>
  
  
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
{{-- 
<script>
  listUser();
  async function listUser() {
    try {
      let response = await axios.get("/List-data");
      console.log(response.data); // Assuming response.data contains the user list
      // Now you can handle the user list data and populate the table
    } catch (error) {
      console.error('Error fetching user list:', error);
    }
  }
</script> --}}
{{-- 
<script>
  listUser();
  async function listUser() {
    try {
      let response = await axios.get("/List-data");
      console.log(response.data); // Assuming response.data contains the user list
      
      let tableList = document.getElementById('tableList');
      
      // Clear existing table rows
      tableList.innerHTML = '';
      
      // Iterate over the user list and create table rows
      response.data.forEach(user => {
        let row = document.createElement('tr');
        row.innerHTML = `
          <td>${user.FirstName}</td>
          <td>${user.LastName}</td>
          <td>${user.Email}</td>
          <td>${user.Password}</td>
          <td>
            <!-- Add action buttons here if needed -->
          </td>
        `;
        
        tableList.appendChild(row);
      });
    } catch (error) {
      console.error('Error fetching user list:', error);
    }
  }
</script> --}}

<script>

  getList();
  
  
  async function getList(){
  
  
      //showLoader();
      let res=await axios.get("/List-data");
     // hideLoader();
     console.log(res);
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
  
      $('.viewBtn').on('click', async function () {
          let id = $(this).data('id');
          let cus = $(this).data('cus');
          await InvoiceDetails(cus,id)
      })
  
      $('.deleteBtn').on('click',function () {
          let id= $(this).data('id');
          document.getElementById('deleteID').value=id;
          $("#delete-modal").modal('show');
      })
  
      new DataTable('#tableData',{
          order:[[0,'desc']],
          lengthMenu:[5,10,15,20,30]
      });
  
  }
  
  
  </script>
  
  

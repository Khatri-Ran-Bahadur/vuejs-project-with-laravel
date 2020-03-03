<template>
<div class="box box-danger">
    <div class="box-header">
        कर्मचारी विवरण
         <button class="btn btn-info pull-right" @click="newModal">Add New <i class="fa fa-staff-plus white"></i></button>
    </div>
    <div class="box-body">
        <div class="container">
            <div class="row mt-5" >
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"></h3>

                    <div class="card-tools">
                       
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-striped dataTable no-footer table-hover" style="width:90%">
                      <thead>
                        <tr id="table-color">
                          <th>क्र. सं.</th>
                          <th>फोटो f</th>
                          <th>नाम</th>
                          <th>पद</th>
                          <th>इमेल</th>
                          <th>कार्यालय न.</th>
                          <th>सम्पादन </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(staff,index) in staffs.data" :key="staff.id" i=index>
                        <td>{{index+1}}</td>
                         <td><img :src="getImage(staff.image)" class=" thumbnail-table" /></td>
                         <td>{{staff.name}}</td>
                         <td>{{staff.staff_post}}</td>
                         <td>{{staff.email}}</td>
                         <td>{{staff.office_no}}</td>
                          <td>
                              <a href="#" @click="editModal(staff)">
                                  <i class="fa fa-edit blue"></i>
                              </a>
                              /
                              <a href="#" @click="deleteStaff(staff.id)">
                                  <i class="fa fa-trash red"></i>
                              </a>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <pagination :data="staffs" @pagination-change-page="getResults"></pagination>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>

            

            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header" id="table-color">
                    <h5 v-show="!editmode" class="modal-title" id="exampleModalLongTitle">Add New</h5>
                    <h5 v-show="editmode" class="modal-title" id="exampleModalLongTitle">Update Staff's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <form @submit.prevent="editmode?updateStaff():createStaff()">
                      <div class="modal-body">
                        
                        <div class="form-group">
                          <input v-model="form.name" type="text" name="name" placeholder="Enter Name of staff" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                          <has-error :form="form" field="name"></has-error>
                        </div>

                        <div class="form-group">
                          <input v-model="form.staff_post" type="text" name="staff_post" placeholder="Enter Post of Staff" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('staff_post') }">
                          <has-error :form="form" field="staff_post"></has-error>
                        </div>

                         <div class="form-group">
                          <input v-model="form.email" type="email" name="email" placeholder="Enter Email of Staff" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                          <has-error :form="form" field="email"></has-error>
                        </div>

                        <div class="form-group">
                          <input v-model="form.office_no" type="text" name="office_no" placeholder="Enter Office Number of Staff" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('office_no') }">
                          <has-error :form="form" field="office_no"></has-error>
                        </div>

                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-3 col-form-label">Profile Image</label>
                            <div class="col-sm-9">
                              <input type="file" name="photo" @change="updateFile" >
                            </div>
                          </div>                

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                  </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
    
</template>

<script>
    export default {
        data(){
            return{
                editmode:false,
                staffs:{},
                form: new Form({
                    id:'',
                    name:'',
                    staff_post:'',
                    email:'',
                    office_no:'',
                    image:''
                })
            }
        },

        methods:{
            getResults(page = 1) {
              axios.get(this.$admin_API+'/staff?page=' + page)
                .then(response => {
                  this.staffs = response.data;
                });
            },
            getImage(img){
                return img;
            },
            updateStaff(){
                this.form.put(this.$admin_API+'/staff/'+this.form.id)
                .then(()=>{
                    this.$Progress.start();
                     Swal.fire('बधाई छ',
                      ' हजुरको कार्य  सफल भयको छ ',
                      'success'
                    );
                    Fire.$emit('refreshstaff');
                    $('#addNew').modal('hide');
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            editModal(staff){
                this.editmode=true;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
                this.form.fill(staff);
            },
            newModal(){
                this.editmode=false;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
            },
            loadStaff(){
               axios.get(this.$admin_API+'/staff').then(({data})=>(this.staffs=data));
            },
            createStaff(){
                this.$Progress.start();
                this.form.post(this.$admin_API+'/staff')
                .then(()=>{
                Fire.$emit('refreshstaff');
                $('#addNew').modal('hide');
                 Swal.fire('बधाई छ',
                      ' हजुरको कार्य  सफल भयको छ ',
                      'success'
                    );
                this.$Progress.finish();

                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            updateFile(e){
                let file = e.target.files[0];
                let reader = new FileReader();

                let limit = 1024 * 1024 * 2;
                if(file['size'] > limit){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    })
                    return false;
                }

                reader.onloadend = (file) => {
                    this.form.image = reader.result;
                }
                reader.readAsDataURL(file);
            },
            deleteStaff(id){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.value) {
                        this.form.delete(this.$admin_API+'/staff/'+id).then(()=>{
                            
                            Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                            )
                            Fire.$emit('refreshstaff');
                        })
                        .catch(()=>{
                            Swal.fire(
                              'Sorry!',
                              'Your file has not been deleted:)',
                              'error'
                            )
                        })
                    }else{
                        Swal.fire(
                          'Sorry!',
                          'Your file has not been deleted:)',
                          'error'
                        )
                    }

                })
            }
        },

        created() {

          // Fire.$on('searching',() => {
          //       let query = this.$parent.search;
          //       this.$Progress.start();
          //       axios.get('api/findstaff?q=' + query)
          //       .then((data) => {
          //           this.staffs = data.data;
          //           this.$Progress.finish();
          //       })
          //       .catch(() => {

          //       })
          //   })
           this.loadStaff();
           Fire.$on('refreshstaff',() => {
               this.loadStaff
           });

            
        }
    }
     
</script>

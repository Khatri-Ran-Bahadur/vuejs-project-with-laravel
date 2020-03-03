<template>
<div class="box box-danger">
    <div class="box-header">
       
         <button class="btn btn-info pull-right" @click="newModal">Add New <i class="fa fa-postalRate-plus white"></i></button>
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
                    <table  class="table table-bordered table-striped dataTable no-footer table-hover " style="width:90%">
                      <thead >
                        <tr>
                          <th >SN</th>
                          <th>FILE</th>
                          <th>DESCRIPTION</th>
                          <th>DOWNLOAD</th>
                          <th>CREATED DATE</th>
                          <th>LAST MODIFIED DATE</th>
                          <th>सम्पादन </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(postalRate,index) in postalRates.data" :key="postalRate.id" i=index>
                        <td>{{index+1}}</td>
                         
                         <td>{{postalRate.file_name}} </td>
                         <td>{{postalRate.description}}</td>
                         <td>download</td>
                         <td>{{postalRate.created_at}}</td>
                         <td>{{postalRate.updated_at}}</td>
                          <td>
                              <a href="#" @click="editModal(postalRate)" class="
                              btn btn-info btn-sm white" >
                                  <i class="fa fa-edit "></i>
                              </a>
                              /
                              <a href="#" @click="deletePostalRate(postalRate.id)" class="
                              btn btn-danger btn-sm white">
                                  <i class="fa fa-trash"></i>
                              </a>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <!-- <pagination :data="postalRates" @pagination-change-page="getResults"></pagination> -->
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>

            

            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 v-show="!editmode" class="modal-title" id="exampleModalLongTitle">Add New</h5>
                    <h5 v-show="editmode" class="modal-title" id="exampleModalLongTitle">Update Postal Rate's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <form @submit.prevent="editmode?updatePostalRate():createPostalRate()" enctype="multipart/form-data">
                      <div class="modal-body">
                        
                        <div class="form-group">
                          <input v-model="form.file_name" type="text" name="file_name" placeholder="Enter file name of postalRate" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('file_name') }">
                          <has-error :form="form" field="file_name"></has-error>
                        </div>

                        <div class="form-group">
                            <textarea v-model="form.description" name="description" id="bio"
                            placeholder="Enter description "
                            class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                            <has-error :form="form" field="description"></has-error>
                        </div>

                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-3 col-form-label">Pdf File </label>
                            <div class="col-sm-9">
                              <input type="file" name="file" @change="updateFile" accept="application/pdf" >
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
                postalRates:{},
                form: new Form({
                    id:'',
                    file_name:'',
                    description:'',
                    file:''
                })
            }
        },

        methods:{
            getResults(page = 1) {
              axios.get(this.$admin_API+'/postal-rates?page=' + page)
                .then(response => {
                  this.postalRates = response.data;
                });
            },
            getImage(file){
                return file;
            },
            updatePostalRate(){

                let formData=new FormData();
                formData.append('file_name',this.form.file_name);
                formData.append('description',this.form.description);
                formData.append('file',this.form.file);
                const config={
                    headers:{'content-type':'multipart/form-data'}
                }
                axios.put(this.$admin_API+'/postal-rates/'+this.form.id,formData,config)
                .then(function(response){
                    this.$Progress.start();
                     Swal.fire('बधाई छ',
                      ' हजुरको कार्य  सफल भयको छ ',
                      'success'
                    );
                    Fire.$emit('refreshPostalRate');
                    $('#addNew').modal('hide');
                    this.$Progress.finish();
                })
                
            },
            editModal(postalRate){
                this.editmode=true;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
                this.form.fill(postalRate);
            },
            newModal(){
                this.editmode=false;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
            },
            loadpostalRate(){
               axios.get(this.$admin_API+'/postal-rates').then(({data})=>(this.postalRates=data));
            },
            createPostalRate(){
                this.$Progress.start();
                
                let formData=new FormData();
                formData.append('file_name',this.form.file_name);
                formData.append('description',this.form.description);
                formData.append('file',this.form.file);
                const config={
                    headers:{'content-type':'multipart/form-data'}
                }

            
                axios.post(this.$admin_API+'/postal-rates',formData,config)
                .then(function(response){
                    Fire.$emit('refreshPostalRate');
                    $('#addNew').modal('hide');
                     Swal.fire('बधाई छ',
                          ' हजुरको कार्य  सफल भयको छ ',
                          'success'
                        );
                    this.$Progress.finish();

                })
                .catch(function(response){
                    this.$Progress.fail();
                    console.log(response.data);
                })
            },
            updateFile(e){
                this.form.file = e.target.files[0];
                
            },
            deletePostalRate(id){
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
                        this.form.delete(this.$admin_API+'/postal-rates/'+id).then(()=>{
                            
                            Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                            )
                            Fire.$emit('refreshpostalRate');
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
          //       axios.get('api/findpostalRate?q=' + query)
          //       .then((data) => {
          //           this.postalRates = data.data;
          //           this.$Progress.finish();
          //       })
          //       .catch(() => {

          //       })
          //   })
           this.loadpostalRate();
           Fire.$on('refreshPostalRate',() => {
               this.loadpostalRate
           });

            
        }
    }
     
</script>

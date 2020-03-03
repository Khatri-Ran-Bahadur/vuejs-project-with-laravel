<template>
<div class="box box-danger">
  <div class="box-header">
    सूचना तथा समाचार
    <button class="btn btn-info pull-right" >Add New <i class="fa fa-staff-plus white"></i></button>
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
             <template>
                  <v-data-table
                    :headers="headers"
                    :items="desserts"
                    sort-by="calories"
                  >                   
                    <template v-slot:item.action="{ item }">
                      <a href="#" class="btn btn-sm btn-info white" @click="editModal(item)">
                          <i class="fa fa-edit"></i>
                      </a>
                      /
                      <a href="#" class="btn btn-sm btn-danger white" @click="deleteItem(item)">
                          <i class="fa fa-trash"></i>
                      </a>

                    </template>
                    
                  </v-data-table>
                </template>
            </div>
           
          </div>
          <!-- /.card -->
        </div>
      </div>
      
        <!-- <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
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
      </div> -->
    </div>
  </div>
</div>

</template>

<script>
  export default {
    data: () => ({
      dialog: false,
      headers: [
        {
          text: 'SN',
          align: 'left',
          sortable: false,
          value: 'name',
        },
        { text: 'Name', value: 'name' },
        { text: 'Description', value: 'carbs' },
        { text: 'Test', value: 'carbs' },
        { text: 'Protein (g)', value: 'protein' },
        { text: 'Actions', value: 'action', sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0,
      },
      defaultItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0,
      },
      tableCss:'table table-bordered ',
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },
    

    created () {
      this.initialize()
    },

    methods: {
      initialize () {
        axios.get(this.$admin_API+'/staff').then(({data})=>(this.desserts=data.data));
        
      },

      editModal (item) {
        Swal.fire('बधाई छ',
                      ' हजुरको कार्य  सफल भयको छ ',
                      'success'
                    );
      },

      deleteItem (item) {
        console.log(item);
        
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
      },

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },
    },
  }
</script>
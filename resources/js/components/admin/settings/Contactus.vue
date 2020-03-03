<template>
	<div>
		<div class="box box-danger">
			<div class="box-header" style="background-color:#f1f1fc;">
				Contact Us Details
			</div>
			<div class="box-body box-form ">
      <p >आफ्नो सम्पूर्ण सम्पर्क विस्तृत विवरण राख्नुहोस !</p>
      <hr>
				<form @submit.prevent="submitForm()">
					
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="phone">फोन:</label>
                  <input type="text" class="form-control" id="phone" v-model="form.phone" placeholder="सम्पर्क नम्बर  राख्नुहोस् " >
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="fax">फ्याक्स: </label>
                  <input type="text" class="form-control" v-model="form.fax" id="fax" placeholder="फ्याक्स नम्बर  राख्नुहोस् ">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="phone">इमेल:</label>
                  <input type="email" class="form-control" v-model="form.email" id="email" placeholder="सम्पर्क नम्बर  राख्नुहोस्" a>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="website">वेबसाइट: </label>
                  <input type="text" class="form-control" v-model="form.website" id="website" placeholder="वेबसाइटको लिंक राख्नुहोस्" autocomplete="off">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="notice">नोटिस बोर्डः</label>
                  <input type="text" class="form-control" id="notice" v-model="form.notice" placeholder=" नोटिस बोर्ड राख्नुहोस्" >
                </div>
            </div>
            
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" class="form-control" v-model="form.facebook" id="facebook" placeholder="Enter facebook link" autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="twitter">Twitter </label>
                  <input type="text" class="form-control" v-model="form.twitter" id="twitter" placeholder="Enter facebook link" >
                </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Youtube </label>
                  <input type="text" class="form-control" v-model="form.youtube" id="youtube" placeholder="Enter youtube channel link" autocomplete="off">
                </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                 <button class="btn btn-primary">Save</button>
                </div>
            </div>
                      
				</form>
			</div>
		</div>       
	</div>
</template>


<script>
    export default {
        data() {
    return {           
            contactus:'',
            form:new Form({
              phone:'',
              fax:'',
              email:'',
              notice:'',
              website:'',
              facebook:'',
              twitter:'',
              youtube:'',
            })               
          }
        },
        methods: {
            loadContact(){
              this.$Progress.start();
              axios.get(this.$admin_API+'/contact-us')
              .then((response)=>{
                  this.form.fill(response.data);
              });
              
              this.$Progress.finish();
            },
            submitForm(){
              this.$Progress.start();
              this.form.post(this.$admin_API+'/contact-us')
              .then(()=>{
                Fire.$emit('refreshData');
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


          },

          created() {
            this.loadContact();
            Fire.$on('refreshData',() => {
              this.loadContact();
            });
          }
    }
</script>
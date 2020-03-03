<template>
    <div class="col-12 col-lg-12">
            <div class="tab-content staff-area">
                <div class="main-comon-title">
                    <h4>कर्मचारी विवरण </h4>
                </div>
                <div class="clearfix"></div>
                <div id="allstaff" class="tab-pane active">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered stafflist">
                            <thead class="bg-primary">
                                <tr>
                                    <th width="5%" style="font-weight: normal!important;">क्र. सं.</th>
                                    <th style="font-weight: normal!important;">फोटो</th>
                                    <th width="15%" style="font-weight: normal!important;">नाम</th>
                                    <th width="15%" style="font-weight: normal!important;">पद</th>
                                    <th style="font-weight: normal!important;">इमेल</th>
                                    <th style="font-weight: normal!important;"> कार्यालय न.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr  v-for="(staff,index) in staffs" :key="staff.id" i=index>
                                    <td width="5%">{{index+1}}</td>
                                    <td>
                                        <img :src="getImage(staff.image)" class="img-thumbnail img-small">
                                    </td>
                                    <td>{{staff.name}}</td>
                                     <td>{{staff.staff_post}}</td>
                                     <td>{{staff.email}}</td>
                                     <td>{{staff.office_no}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data() {
            return {
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
        methods: {
            getImage(img){
                return img;
            },
            loadData(){
                axios.get(this.$public_API+'/staff').then(({data})=>(this.staffs=data));
            }
        },
        created() {
            this.loadData();       
        }
    }
</script>


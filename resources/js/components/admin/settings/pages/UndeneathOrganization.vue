<template>
    <div >
        <div class="box box-danger">
            <div class="box-header">
                विभाग अन्तर्गतका निकायहरू
            </div>
            <div class="box-body">

                <form @submit.prevent="addNew()">
                    <ckeditor
                    editor="classic"
                    tag-name="textarea"
                    v-model="form.details"
                    :editor="editor"
                    :config="editorConfig"           

                    ></ckeditor>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>               
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>       
    </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {

    data() {
        return {
            editor: ClassicEditor,
            detailsdata:'',
            editorConfig:{},
            form:new Form({
                id:'',
                details:''
            })               
        }
    },
    methods: {
        loadDetails(){
            this.$Progress.start();
            axios.get(this.$admin_API+'/underneath-organizations').then(({data})=>(this.form.details=data.value));
            this.$Progress.finish();
        },
        addNew(){
            
            this.form.post(this.$admin_API+'/underneath-organizations')
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
        this.loadDetails();
        Fire.$on('refreshData',() => {
            this.loadAbout();
        });
    }


}

</script>
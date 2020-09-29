<template>
    <div class="modal fade" id="reviewApplication"  data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{this.reviewer ? 'Review' : 'Process'}} - User ({{application.fname}})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" v-model="is_approved" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">Approve</label>
                    </div>
                </div>

                    <div v-show="!is_approved" class="form-group">
                        <label>Comment:</label>

                        <textarea class="form-control" v-model="comment">
                        </textarea>
                    </div>

                </div>

                <div class="modal-footer" style = "padding-top: 0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button :disabled="disabled" type="button" @click="reviewApp()" class="btn btn-primary">
                        <i v-if="disabled" class="fas fa-spinner fa-pulse"></i>

                        <span >Submit</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "ReviewApp",

        data(){

            return{

                is_approved: false,
                comment: '',
                application: '',
                reviewer: '',
                disabled: false

            }
        },

        mounted() {

            this.$parent.$on('review_app', (application, reviewer) => {

                this.disabled = false;
                this.application = application;
                this.reviewer = reviewer;
                $('#reviewApplication').modal('show')

            });

        },

        methods: {

            reviewApp(){

                if(this.reviewer){

                    this.disabled = true;

                    this.$http.put(`/admin/application/reviewer/${this.application.id}`, {

                        'is_approved': this.is_approved,
                        'comment': this.comment,

                    }).then(res => {

                        this.$parent.$emit('update_application', res.data);
                        $('#reviewApplication').modal('hide')
                        this.disabled = false;


                    }).catch(err => {

                        this.disabled = false

                        console.log(err.response)
                    })
                }else{

                    this.disabled = true;

                    this.$http.put(`/admin/application/processor/${this.application.id}`, {

                        'is_approved': this.is_approved,
                        'comment': this.comment,

                    }).then(res => {

                        this.disabled = false
                        this.$parent.$emit('update_application', res.data);
                        $('#reviewApplication').modal('hide')

                    }).catch(err => {

                        this.disabled = false

                        console.log(err.response)
                    })

                }                }





        }
    }
</script>

<style scoped>

    textarea{

        height: 100px !important;
    }

</style>

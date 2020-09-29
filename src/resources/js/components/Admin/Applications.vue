<template>
    <div>

        <div class="card-header row" >
        </div>
        <br>
        <div class="box-body">

            <table id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Picture</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Sex</th>
                    <th>State of Origin</th>
                    <th>Occupation</th>
                    <th>Word Doc</th>
                    <th>Pdf Doc</th>
                    <th>Address</th>
                    <th>Application Type</th>
                    <th>State</th>
                    <th>Test Score</th>
                    <th>First Time</th>
                    <th>Approves</th>
                    <th>Review</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="application, key in applications">
                    <td>{{key + 1}}</td>
                    <td>
                        <img :src="application.picture_url" height="50" width="50" alt="">
                    </td>
                    <td>{{application.fname}}</td>
                    <td>{{application.lname}}</td>
                    <td>{{application.email}}</td>
                    <td>{{application.dob}}</td>
                    <td>{{application.sex}}</td>
                    <td>{{application.state_of_origin}}</td>
                    <td>{{application.occupation}}</td>
                    <td>
                        <a target="_blank" :href="application.word_doc_url"> Click to view</a>
                    </td>
                    <td>
                        <a target="_blank" :href="application.pdf_doc_url"> Click to view</a>
                    </td>
                    <td>{{application.license_reg.address}}</td>
                    <td>{{application.license_reg.application_type}}</td>
                    <td>{{application.license_reg.state}}</td>
                    <td>{{application.license_reg.test_score}}</td>
                    <td>{{application.license_reg.is_first_time ? 'Yes' : 'No'}}</td>
                    <td v-if="reviewer">
                        <span v-if="application.reviewer_approves" class="badge badge-primary">Yes</span>
                        <span v-else class="badge badge-warning">No</span>
                    </td>
                    <td v-else>
                        <span v-if="application.processor_approves" class="badge badge-primary">Yes</span>
                        <span v-else class="badge badge-warning">No</span>
                    </td>

                    <td v-if="reviewer">
                        <a v-if="!application.reviewer_approves" @click="reviewApplication(application)" href="#">
                            <i class="text-center fas fa-2x fa-star"></i></a>
                        <a v-else ><i class="text-center fas fa-2x fa-star"></i></a>
                    </td>
                    <td v-else>
                        <a v-if="!application.processor_approves" @click="reviewApplication(application)" href="#">
                            <i class="text-center fas fa-2x fa-star"></i></a>
                        <a v-else ><i class="text-center fas fa-2x fa-star"></i></a>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Picture</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Sex</th>
                    <th>State of Origin</th>
                    <th>Occupation</th>
                    <th>Word Doc</th>
                    <th>Pdf Doc</th>
                    <th>Address</th>
                    <th>Application Type</th>
                    <th>State</th>
                    <th>Test Score</th>
                    <th>First Time</th>
                    <th>Approves</th>
                    <th>Review</th>

                </tr>
                </tfoot>

            </table>

        </div>

        <review-app></review-app>

    </div>

</template>

<script>
    import Swal from 'sweetalert'
    export default {
        name: "Applications",

        props: ['raw_applications', 'is_reviewer'],

        data(){

            return{

                applications: JSON.parse(this.raw_applications),
                reviewer: (this.is_reviewer === "1")

            }
        },

        mounted(){

            this.$on('update_application', (application) => {

                const index = this.applications.findIndex(item => item.id === application.id);
                this.applications.splice(index, 1, application);

                this.$swal('Application Updated Successfully!!')
            })

        },

        computed: {


        },

        methods: {

            reviewApplication(application){

                console.log("reviewing .... ")

                this.$emit('review_app', application, this.reviewer)

            },

        }
    }
</script>

<style scoped>

</style>

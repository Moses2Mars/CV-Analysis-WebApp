<template>
    <div class="card-outline" :class="job.state" @click="routeToJobListing">
        <span class="job-position"> 
            <h2>{{job.position_required}}</h2>
        </span>
        <span class="job-field"> 
            <span class="static-text"> Field: </span> 
            {{job.field_required}}
        </span>
        <span class="contact-email">
            <span class="static-text"> Company Contact: </span> 
            {{job.contact_email}}
        </span>
        <span class="applicants-needed">
            <span class="static-text"> Applicants Needed: </span>
            {{job.applicants_needed}} 
            </span>
        <span class="applicants-applied" v-if="!is_candidate"> 
            <span class="static-text"> Applicants Applied: </span> 
            {{job.applicants_applied}}
        </span>
        <span class="release-date">
            <span class="static-text"> Release Date: </span> 
            {{job.release_date}} 
        </span>
        <span class="expiry-date">
            <span class="static-text"> Expiry Date: </span>
            {{job.expiry_date}} 
        </span>  
        <span v-if="is_candidate" class="job-list-state"> 
            <span class="static-text"> Company Name: </span>
            {{job.company_name}}
        </span>
        <span v-else class="job-list-state">
            <span class="static-text"> Job Listing State: </span>
            {{job.state}}
        </span>
        
  </div>
</template>

<script>
export default {
    props: {
        job: {
            default: null,
            type: undefined,
        },
        is_candidate: {
            default: false,
            type: Boolean,
        }
    },
    methods: {
        routeToJobListing() {
            this.$router.push(`/job-listing/${this.job.uuid}`);
        }
    }
}
</script>

<style scoped>
.card-outline {
    height: 10rem;
    max-height: 10rem;
    width: 45rem;
    max-width: 45rem;
    margin: auto; 
    margin-top: 30px;
    border-radius: 14px;
    display: grid;
    grid-template-columns: 0.1fr 1fr 1fr 1fr 0.1fr;
    grid-template-rows: 0.5fr 2fr 1fr 1fr 2fr 0.5fr;
    align-items: center;
    justify-items: center;
    background-color: rgb(91, 169, 206);
    color: black;
    -webkit-box-shadow: 5px 7px 14px 1px #000000; 
    box-shadow: 5px 7px 14px 1px #000000;
    transition: 0.3s;
    cursor: pointer;
}
.card-outline:hover {
    background-color: rgb(12, 119, 168);
}
.static-text {
    font-weight: 600;
}
.Running {
    background-color: rgb(96, 199, 82);
}
.Running:hover {
    background-color: rgb(63, 177, 48);
}
.Complete {
    background-color: rgb(95, 95, 95);
    color: white;
}
.Complete:hover {
    background-color: rgb(59, 59, 59);
}

.Scheduled {
    background-color: rgb(243, 111, 111);
}
.Scheduled:hover {
    background-color: rgb(231, 66, 66);
    cursor: pointer;
}
.job-position{
    grid-row: 2/3;
    grid-column: 2/5;
}
.job-field {
    grid-row: 3/4;
    grid-column: 2/4;
}
.contact-email {
    grid-row: 4/5;
    grid-column: 2/4;
}
.applicants-needed { 
    grid-row: 5/6;
    grid-column: 2/3;
}
.applicants-applied {
    grid-row: 5/6;
    grid-column: 3/4;
}
.release-date {
    grid-row: 3/4;
    grid-column: 4/5;
}
.expiry-date {
    grid-row: 4/5;
    grid-column: 4/5;
}
.job-list-state {
    grid-row: 5/6;
    grid-column: 4/5;
}
</style>
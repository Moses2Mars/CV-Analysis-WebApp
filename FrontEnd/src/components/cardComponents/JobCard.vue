<template>
    <div class="card-outline" :class="job.state">
        <span class="job-position"> 
            <h3>{{job.position_required}}</h3>
        </span>
        <span class="job-field"> 
            {{job.field_required}}
        </span>
        <span v-if="is_candidate" class="company-name"> 
            <span style="font-weight: 700; color: purple">{{job.company_name}}</span>
        </span>
        <span class="release-date">
            <span class="static-text"> Released: </span> 
            {{job.release_date}} 
        </span>
        <span class="expiry-date">
            <span class="static-text"> Expires: </span>
            {{job.expiry_date}} 
        </span> 
        <span class="applicants-applied" v-if="!is_candidate"> 
            <span class="static-text"> Applicants:</span> 
            {{job.applicants_applied}}
        </span> 
        <span v-if="!is_candidate" class="job-list-state">
            <span class="static-text"> State: </span>
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
}
</script>

<style scoped>
.card-outline {
    height: 15rem;
    max-height: 15rem;
    width: 25rem;
    max-width: 25rem;
    margin: auto; 
    margin-top: 30px;
    border-radius: 8px;
    background-color: white;
    color: black;
    transition: 0.3s;
    cursor: pointer;
    -webkit-box-shadow: 8px 10px 10px -3px #909090; 
    box-shadow: 8px 10px 10px -3px #909090;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr 1fr 1fr;
    align-items: center;
    justify-items: left;
}
.card-outline:hover {
    background-color: rgb(255, 228, 228);
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
    padding: 15px;
    grid-column: 1/3;
    grid-row: 1/2;
}
.job-field {
    padding: 15px;
    grid-column: 1/2;
    grid-row: 2/4;
    
}
.company-name {
    padding: 15px;
    grid-column: 1/2;
    grid-row: 4/5;   
}
.release-date {
    padding: 15px;
    grid-column: 1/2;
    grid-row: 5/6;
}
.expiry-date {
    padding: 15px;
    grid-column: 2/3;
    grid-row: 5/6;
}
.job-list-state {
    padding: 15px;
    grid-column: 2/3;
    grid-row: 2/3;
}
.applicants-applied {
    padding: 15px;
    grid-column: 2/3;
    grid-row: 3/4;
}
</style>